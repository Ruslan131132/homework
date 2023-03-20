<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function get(Request $request)
    {
        $data = Order::where('user_id', Auth::user()->id)->orderBy('created_at')->get();

        return view('home', compact('data'));
    }

    public function create(Request $request)
    {
        $data = Order::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));

        return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $deleted = Order::find($request->id)->delete();

        return redirect()->route('home');
    }
}
