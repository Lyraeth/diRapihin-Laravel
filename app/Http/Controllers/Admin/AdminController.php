<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua orderan dari database
        $orders = FileUpload::all();

        // Return view dengan data orderan
        return view('admin.orders', compact('orders'));
    }
}
