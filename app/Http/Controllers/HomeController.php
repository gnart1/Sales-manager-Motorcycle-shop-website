<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Carbon\Carbon;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_products = ProductModel::getAll()->count();
        $total_orders = OrderDetailModel::getAll()->count();


        //5 loại xe được mua nhiều nhất
        $favourite_products = ProductModel::getFavouriteProduct();
        //dd($total_products,$total_orders);
        //  dd($favourite_products);
        return view('dashboard',['total_products'=> $total_products,
        'total_orders'=> $total_orders,
        'favourite_products' => $favourite_products
        
    ]);
    }
    public function filter_by_date(Request $request){

        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        
        $get = OrderDetailModel::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id')         
         ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id') 
         ->join('product', 'productdetail.idProduct', '=', 'product.id') 
         ->where('orders.type', '=', '1')
        ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity','product.name as name',
                'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount' 
               ])
               
        ->get();

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'product'=> $val->name,
                'quantity' => $val->quantity,
            );
        }
        
        echo $data = json_encode($chart_data);
    }

    public function filter_by_date1(Request $request){
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = OrderDetailModel::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
         ->where('orders.type', '=', '0')
        ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
               ])
               
        ->get();

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }
    
    public function filter_by_date2(Request $request){
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = OrderDetailModel::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
         ->where('orders.type', '=', '2')
        ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
               ])
               
        ->get();

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }

    //filter of date
    public function dashboard_filter(Request $request){
        $data = $request->all();

        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString(); 

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub1year = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id') 
            ->join('product', 'productdetail.idProduct', '=', 'product.id') 
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity', 'product.name as nameProduct',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id') 
            ->join('product', 'productdetail.idProduct', '=', 'product.id') 
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity', 'product.name as nameProduct',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value'] == 'thangnay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id') 
            ->join('product', 'productdetail.idProduct', '=', 'product.id') 
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity', 'product.name as nameProduct',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        else{
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id') 
            ->join('product', 'productdetail.idProduct', '=', 'product.id') 
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity', 'product.name as nameProduct',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'product' => $val->nameProduct,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }
    //loc nhap xe
    public function dashboard_filter1(Request $request){
        $data = $request->all();

        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString(); 

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub1year = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value1'] == '7ngay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value1'] == 'thangtruoc'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value1'] == 'thangnay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        else{
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }

    //loc bao duong
    public function dashboard_filter2(Request $request){
        $data = $request->all();

        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString(); 

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub1year = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value2'] == '7ngay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value2'] == 'thangtruoc'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        elseif($data['dashboard_value2'] == 'thangnay'){
            $get = OrderDetailModel::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }
        else{
            $get = OrderDetailModel::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
           ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                   'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
                  ])          
           ->get();
        }

        foreach($get as $key =>$val){
            $chart_data[] = array(
                'period' => $val->datetime,
                'order' => $val->total_amount,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
