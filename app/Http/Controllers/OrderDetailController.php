<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\OrderDetailModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderModel;
use DateTime;
use App\Models\ProductDetailModel;
use App\Models\ProductInOrder;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdetails = OrderDetailModel::getAll();
        $productInOrder = [];
        foreach ($orderdetails as $key => $value) {
            $productInOrder = DB::table('product_in_order')
                ->join('productdetail', 'product_in_order.idProductDetail', '=', 'productdetail.id')
                ->join('product', 'productdetail.idProduct', '=', 'product.id')
                ->where('idOrderDetail', $value->id)
                ->select(['product_in_order.id', 'product_in_order.idOrderDetail', 'product_in_order.idProductDetail', 'product_in_order.quantity', 'productdetail.idProduct as idProduct', 'product.name as nameProduct', 'product.type as type', 'productdetail.price'])
                ->get();
            $orderdetails[$key]->productInOrder = $productInOrder;
        }

        return view('pages.order-detail.order-detail', ['orderdetails' => $orderdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $customers = CustomerModel::getAll();
        $productDetail
            = DB::table('productdetail')
            ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
            ->join('product', 'productdetail.idProduct', '=', 'product.id')
            ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
            ->select([
                'productdetail.id as id', 'color', 'price', 'model', 'quantity',
                'idWareHouse',  'warehouse.name as nameWareHouse',
                'idProduct', 'product.name as nameProduct', 'type',
                'idSupplier', 'supplier.name as nameSupplier'
            ])
            ->get();
        $productDetail_pt
            = DB::table('productdetail')
            ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
            ->join('product', 'productdetail.idProduct', '=', 'product.id')
            ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
            ->where('product.type', '=', 1)
            ->select([
                'productdetail.id as id', 'color', 'price', 'model', 'quantity',
                'idWareHouse',  'warehouse.name as nameWareHouse',
                'idProduct', 'product.name as nameProduct', 'type',
                'idSupplier', 'supplier.name as nameSupplier'
            ])
            ->get();
        $order = OrderModel::getAll();

        return view('pages.order-detail.create-order-detail', ['customers' => $customers, 'productDetail_pt' => $productDetail_pt, 'productDetail' => $productDetail, 'orders' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new OrderModel();
        $order->name = $request->name;
        $order->datetime = new DateTime();
        $order->type = $request->type;
        $order->idAdmin = Auth::guard('admin')->user()->id;
        $order->phoneCustomer = $request->phoneNumber;
        $order->save();

        $order_detail = new OrderDetailModel();
        $order_detail->idOrder = $order->id;
        $order_detail->wage = $request->wage;
        $order_detail->total_amount = 0;
        $order_detail->save();

        foreach ($request->product as $key => $value) {
            ProductInOrder::insert([
                'idOrderDetail' => $order_detail->id,
                'idProductDetail' => $request->product[$key]['id'],
                'quantity' =>  $request->product[$key]['quantity'],
            ]);
        }

        foreach ($request->product as $key => $value) {
            $product = ProductDetailModel::find($request->product[$key]['id']);

            $quantity = 0;
            if ($request->input('type') == 0) {
                $quantity = $product->quantity + $request->product[$key]['quantity'];
            } else {
                $quantity = $product->quantity - $request->product[$key]['quantity'];
            }

            $product->quantity = $quantity;
            $product->save();
        }


        $order_detail_update = OrderDetailModel::find($order_detail->id);
        $total_amount = 0;
        foreach ($request->product as $key => $value) {
            $product = ProductDetailModel::find($request->product[$key]['id']);

            $total_amount += $request->product[$key]['quantity'] * $product->price;
        }


        $order_detail_update->total_amount = $total_amount + $request->wage;
        $order_detail_update->save();


        return redirect('/orderdetail');
    }
    public function storeChoose(Request $request)
    {
        $order = OrderModel::find($request->input('idOrder'));
        $product = ProductDetailModel::find($request->input('idProductDetail'));
        $order_detail = new OrderDetailModel();
        $quantity = 0;
        if ($order->type == 0) {
            $quantity = $product->quantity + $request->input('quantity');
        } else {
            $quantity = $product->quantity - $request->input('quantity');
        }
        $order_detail->quantity = $quantity;
        $order_detail->idOrder = $request->input('idOrder');
        $order_detail->wage = $request->input('wage');
        $order_detail->total_amount = $product->price * $request->input('quantity') + $request->input('wage');
        $order_detail->idProductDetail = $request->input('idProductDetail');
        $order_detail->save();

        return redirect('/orderdetail')->withStatus(__('Sửa sản phẩm thành công.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
