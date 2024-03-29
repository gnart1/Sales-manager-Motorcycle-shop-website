<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductInOrder;
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
        //dd($favourite_products);

        $product_of_last_month =OrderDetailModel::all();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_of_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $product_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        // INNER JOIN orderdetail ON product_in_order.idOrderDetail = orderdetail.id
        //     INNER JOIN orders ON orderdetail.idOrder = orders.id AND `type` = 1
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '1')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get(); 
        $totalamount_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '1')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();   

        $product_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '1')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();  
        $totalamount_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '1')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();     

        $product_of_last_month_sum = $product_of_last_month->sum('quantity');
        //dd($product_of_last_month_sum);
        $totalamount_of_last_month_sum = $totalamount_of_last_month->sum('total_amount');
        $product_of_month_sum = $product_of_month->sum('quantity');
        //dd($product_of_month_sum);
        $totalamount_of_month_sum = $totalamount_of_month->sum('total_amount');

        //bảo dưỡng
        $maintenance_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '2')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get(); 
        $totalamount_maintenance_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '2')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();

        $maintenance_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '2')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();    
        $totalamount_maintenance_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '2')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();  

        $maintenance_of_last_month_sum = $maintenance_of_last_month->sum('quantity');
        $totalamount_maintenance_of_last_month_sum = $totalamount_maintenance_of_last_month->sum('total_amount');
        $maintenance_of_month_sum = $maintenance_of_month->sum('quantity');
        $totalamount_maintenance_of_month_sum = $totalamount_maintenance_of_month->sum('total_amount');

        //nhập hàng
        $import_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '0')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();  
        $totalamount_import_of_last_month = ProductInOrder::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '0')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();   

        $import_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '0')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();    
        $totalamount_import_of_month = ProductInOrder::whereBetween('orders.datetime',[$early_of_month,$now])->orderBy('datetime','ASC')        
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '0')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();      

        $import_of_last_month_sum = $import_of_last_month->sum('quantity');
        $totalamount_import_of_last_month_sum = $totalamount_import_of_last_month->sum('total_amount');
        $import_of_month_sum = $import_of_month->sum('quantity');
        $totalamount_import_of_month_sum = $totalamount_import_of_month->sum('total_amount');
        return view('dashboard',['total_products'=> $total_products,
        'total_orders'=> $total_orders,
        'favourite_products' => $favourite_products,

        'product_of_last_month_sum'=>$product_of_last_month_sum,
        'product_of_month_sum' => $product_of_month_sum,
        'totalamount_of_month_sum' => $totalamount_of_month_sum,
        'totalamount_of_last_month_sum' => $totalamount_of_last_month_sum,

        'maintenance_of_last_month_sum'=>$maintenance_of_last_month_sum,
        'totalamount_maintenance_of_last_month_sum' => $totalamount_maintenance_of_last_month_sum,
        'maintenance_of_month_sum' => $maintenance_of_month_sum,
        'totalamount_maintenance_of_month_sum' => $totalamount_maintenance_of_month_sum,

        'import_of_last_month_sum'=>$import_of_last_month_sum,
        'totalamount_import_of_last_month_sum' => $totalamount_import_of_last_month_sum,
        'import_of_month_sum' => $import_of_month_sum,
        'totalamount_import_of_month_sum' => $totalamount_import_of_month_sum
        
    ]);
    }
    // public function thongke_dashboard(Request $request){
    //     //$data = request()->all();
       
        

    //     $product_of_last_month = OrderDetailModel::whereBetween('orders.datetime',[$early_last_month,$end_of_last_month])->orderBy('datetime','ASC')        
    //     ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
    //     ->where('orders.type', '=', '1')
    //    ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity', 
    //            'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
    //           ])          
    //     ->get();    
    //     $product_of_last_month_count = $product_of_last_month->count();


    //     return view('dashboard',['product_of_last_month_count'=>$product_of_last_month_count]);
    // }
    public function filter_by_date(Request $request){

        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        
        $get = ProductInOrder::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '1')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type',
               'idOrderDetail','orderdetail.total_amount', 
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

    public function filter_by_date1(Request $request){
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = ProductInOrder::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '0')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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

        $get = ProductInOrder::whereBetween('orders.datetime',[$from_date,$to_date])->orderBy('datetime','ASC')
        ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
        ->where('orders.type', '=', '2')
       ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
           ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get(); 
        }
        elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get(); 
        }
        elseif($data['dashboard_value'] == 'thangnay'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get(); 
        }
        else{
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        elseif($data['dashboard_value1'] == 'thangtruoc'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        elseif($data['dashboard_value1'] == 'thangnay'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        else{
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub7days,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        elseif($data['dashboard_value2'] == 'thangtruoc'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangtruoc,$cuoithangtruoc])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        elseif($data['dashboard_value2'] == 'thangnay'){
            $get = ProductInOrder::whereBetween('orders.datetime',[$dauthangnay,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
               'idOrder',  'orders.name as nameOrder','orders.datetime as datetime', 'orders.type','orderdetail.total_amount', 
              ])          
        ->get();
        }
        else{
            $get = ProductInOrder::whereBetween('orders.datetime',[$sub1year,$now])->orderBy('datetime','ASC')
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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

    public function days_filter(Request $request){

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            $get = ProductInOrder::whereBetween('orders.datetime',[$sub30days,$now])->orderBy('datetime','ASC')        
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '1')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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

    public function days_filter1(Request $request){

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            $get = ProductInOrder::whereBetween('orders.datetime',[$sub30days,$now])->orderBy('datetime','ASC')        
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '0')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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

    public function days_filter2(Request $request){

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            $get = ProductInOrder::whereBetween('orders.datetime',[$sub30days,$now])->orderBy('datetime','ASC')        
            ->join('orderdetail', 'product_in_order.idOrderDetail', '=', 'orderdetail.id')
            ->join('orders', 'orderdetail.idOrder', '=', 'orders.id') 
            ->where('orders.type', '=', '2')
            ->select(['product_in_order.id as id', 'product_in_order.quantity as quantity', 
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

    
}