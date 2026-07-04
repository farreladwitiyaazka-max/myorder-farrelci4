<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    // ==========================
    // DAFTAR PRODUK
    // ==========================
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel
                ->select('products.*, categories.name as category')
                ->join('categories', 'categories.id = products.category_id')
                ->findAll()
        ];

        return view('admin/product/index', $data);
    }

    // ==========================
    // FORM TAMBAH
    // ==========================
    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'categories' => $this->categoryModel->findAll()
        ];

        return view('admin/product/create', $data);
    }
    // ==========================
// SIMPAN PRODUK
// ==========================
public function store()
{
    $gambar = $this->request->getFile('image');

    $namaGambar = 'default.jpg';

    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {

        $namaGambar = $gambar->getRandomName();

        $gambar->move(FCPATH . 'assets/uploads', $namaGambar);
    }

    $this->productModel->save([
        'category_id' => $this->request->getPost('category_id'),
        'name'        => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'price'       => $this->request->getPost('price'),
        'stock'       => $this->request->getPost('stock'),
        'image'       => $namaGambar
    ]);

    return redirect()->to('/admin/products')
        ->with('success', 'Produk berhasil ditambahkan.');
}
// ==========================
// FORM EDIT
// ==========================
public function edit($id)
{
    $data = [
        'title' => 'Edit Produk',
        'product' => $this->productModel->find($id),
        'categories' => $this->categoryModel->findAll()
    ];

    return view('admin/product/edit', $data);
}

// ==========================
// UPDATE PRODUK
// ==========================
public function update($id)
{
    $produkLama = $this->productModel->find($id);

    $gambar = $this->request->getFile('image');

    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {

        $namaGambar = $gambar->getRandomName();

        $gambar->move(FCPATH . 'assets/uploads', $namaGambar);

    } else {

        $namaGambar = $produkLama['image'];
    }

    $this->productModel->update($id, [

        'category_id' => $this->request->getPost('category_id'),
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'price' => $this->request->getPost('price'),
        'stock' => $this->request->getPost('stock'),
        'image' => $namaGambar

    ]);

    return redirect()->to('/admin/products')
        ->with('success','Produk berhasil diupdate.');
}
// ==========================
// HAPUS PRODUK
// ==========================
public function delete($id)
{
    $produk = $this->productModel->find($id);

    if ($produk && !empty($produk['image'])) {

        $path = FCPATH . 'assets/uploads/' . $produk['image'];

        if (file_exists($path)) {

            unlink($path);

        }

    }

    $this->productModel->delete($id);

    return redirect()->to('/admin/products')
        ->with('success','Produk berhasil dihapus.');
}
}