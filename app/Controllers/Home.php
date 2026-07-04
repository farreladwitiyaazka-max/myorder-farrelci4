<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $keyword = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        if ($keyword) {
            $productModel->like('name', $keyword);
        }

        if ($kategori) {
            $productModel->where('category_id', $kategori);
        }

        $data['products'] = $productModel->findAll();
        $data['categories'] = $categoryModel->findAll();

        return view('home/index', $data);
    }
}