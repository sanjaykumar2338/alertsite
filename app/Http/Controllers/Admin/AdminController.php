<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
class AdminController extends Controller{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request){
        return view('admin.pages.dashboard')->with('activeLink','dashboard');
    }

    public function order(){
        $orders = Payment::join('users','users.id','=','payments.user_id')->select('payments.*','users.name')->paginate(5);
        return view('admin.pages.order.index')->with('orders',$orders)->with('activeLink','order');
    }

    public function customer(){
        $customers = User::paginate(5);
        return view('admin.pages.user.index')->with('customers',$customers)->with('activeLink','customer');
    }
}
