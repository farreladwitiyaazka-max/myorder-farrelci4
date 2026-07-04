<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $cart;
    protected $product;

    public function __construct()
    {
        $this->cart = new CartModel();
        $this->product = new ProductModel();
    }

    public function index()
    {
        $user = session()->get('id');

        $data['cart'] = $this->cart
            ->select('cart.*, products.name, products.price, products.image')
            ->join('products', 'products.id=cart.product_id')
            ->where('user_id', $user)
            ->findAll();

        return view('cart/index', $data);
    }

    public function add($id)
{
    $user = session()->get('id');

    if (!$user) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Silakan login terlebih dahulu.'
        ]);
    }

    $cek = $this->cart
        ->where('user_id', $user)
        ->where('product_id', $id)
        ->first();

    if ($cek) {

        $this->cart->update($cek['id'], [

            'qty' => $cek['qty'] + 1

        ]);

    } else {

        $this->cart->insert([

            'user_id' => $user,
            'product_id' => $id,
            'qty' => 1

        ]);

    }

    return $this->response->setJSON([
        'status' => true,
        'message' => 'Produk berhasil ditambahkan.'
    ]);
}

    public function delete($id)
    {
        $this->cart->delete($id);

        return redirect()->to('/cart');
    }

    // =============================
// TAMBAH QTY
// =============================
public function plus($id)
{
    $cart = $this->cart->find($id);

    if ($cart) {

        $this->cart->update($id, [

            'qty' => $cart['qty'] + 1

        ]);

    }

    return redirect()->to('/cart');
}

// =============================
// KURANG QTY
// =============================
public function minus($id)
{
    $cart = $this->cart->find($id);

    if ($cart) {

        if ($cart['qty'] > 1) {

            $this->cart->update($id, [

                'qty' => $cart['qty'] - 1

            ]);

        }

    }

    return redirect()->to('/cart');
}
}