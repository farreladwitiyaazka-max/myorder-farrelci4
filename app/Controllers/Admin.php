<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\OrderModel;

class Admin extends BaseController
{
    public function index()
    {
        $product = new ProductModel();
        $user = new UserModel();
        $order = new OrderModel();

        $data = [
            'title' => 'Dashboard Admin',
            'jumlahProduk' => $product->countAll(),
            'jumlahUser' => $user->countAll(),
            'jumlahOrder' => $order->countAll()
        ];

        return view('admin/dashboard', $data);
    }
}