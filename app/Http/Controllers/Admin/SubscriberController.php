<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber',compact('subscribers'));
    }
    public function destroy($subscriber)
    {
        Subscriber::find($subscriber)->delete();

        Toastr::success('Subscriber Deleted','Success');
        return redirect()->back();
    }
}
