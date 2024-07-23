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
}
