<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;

class AdminController extends Controller
{
    public function index()
    {
        $orders = FileUpload::with('service')->get();
        return view('admin.orders', compact('orders'));
    }

    public function detailOrder($id)
    {
        $orders = FileUpload::with('service')->find($id);
        $detailOrders = FileUpload::where('id', $id)->get();

        return view('admin.detailOrder', compact('orders', 'detailOrders'));
    }
}
