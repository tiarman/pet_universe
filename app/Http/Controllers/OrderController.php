<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->roles->pluck('name');
        if ($role[0] == 'Super Admin') {
            $datas['orders']    = Order::with('user')->get();
            $datas['role']      = $role;
            $total_order = DB::table('orders')->where('user_id', Auth::id())->count();
            $complete_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 'pending')->count();
            $pending = DB::table('orders')->where('user_id', Auth::id())->where('status', 'complete')->count();
            $cancel_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
            $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();
            // return $datas;
            return view('admin.order.index', $datas, compact('total_order','complete_order','pending', 'cancel_order', 'return_order'));
        } else {
            $datas['orders']    = Order::where('user_id', auth()->id())->with('user')->get();
            $datas['role']      = $role[0];

            $total_order = DB::table('orders')->where('user_id', Auth::id())->count();
            $complete_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 'complete')->count();
            $pending = DB::table('orders')->where('user_id', Auth::id())->where('status', 'PENDING')->count();
            $cancel_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
            $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();

            return view('admin.order.index', $datas, compact('total_order','complete_order','pending', 'cancel_order', 'return_order'));
        }
    }

    public function ajaxUpdateStatus(Request $request)
    {
        $order = Order::find($request->id);

        if ($order->update(['status' => $request->status])) {
            return 'success';
        }
    }
}
