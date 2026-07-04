<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    protected $cart;
    protected $order;

    public function __construct()
    {
        $this->cart = new CartModel();
        $this->order = new OrderModel();
    }

    public function index()
    {
        $user = session()->get('id');

        $data['cart'] = $this->cart
            ->select('cart.*, products.name, products.price')
            ->join('products', 'products.id = cart.product_id')
            ->where('user_id', $user)
            ->findAll();

        return view('checkout/index', $data);
    }

    public function process()
    {
        $user = session()->get('id');

        $cart = $this->cart
            ->where('user_id', $user)
            ->findAll();

        if (!$cart) {
            return redirect()->to('/cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        foreach ($cart as $item) {

            $this->order->insert([
                'user_id'    => $user,
                'product_id' => $item['product_id'],
                'qty'        => $item['qty'],
                'status'     => 'Lunas'
            ]);

        }

        // kosongkan keranjang
        $this->cart->where('user_id', $user)->delete();

        return redirect()->to('/')
            ->with('success', '🎉 Pembayaran berhasil. Terima kasih telah berbelanja di MyOrder!');
    }
}