<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Daftar Produk | MyOrder</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f5f5f5;
    font-family:'Segoe UI',sans-serif;
}

/* Sidebar */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:240px;
    height:100vh;
    background:#111;
    padding:30px 20px;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:40px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:13px 15px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar a:hover{
    background:white;
    color:black;
}

/* Content */

.content{
    margin-left:260px;
    padding:40px;
}

.box{

    background:white;

    border-radius:25px;

    padding:35px;

    box-shadow:0 10px 25px rgba(0,0,0,.05);

}

.table{

    vertical-align:middle;

}

.table img{

    width:90px;

    height:90px;

    object-fit:cover;

    border-radius:15px;

}

.btn-dark{

    border-radius:12px;

}

.btn-outline-dark{

    border-radius:12px;

}

.btn-danger{

    border-radius:12px;

}

.title{

    font-size:30px;

    font-weight:bold;

}

</style>

</head>

<body>

<!-- Sidebar -->

<body>

<div class="sidebar">

<h2>MYORDER</h2>

<a href="/admin">Dashboard</a>

<a href="/admin/products">Produk</a>

<a href="/">Website</a>

<a href="/logout">Logout</a>

</div>

<!-- Content -->

<div class="content">

<div class="box">

<div class="d-flex justify-content-between align-items-center mb-4">

<div class="title">

Daftar Produk

</div>

<a href="/admin/products/create" class="btn btn-dark">

+ Tambah Produk

</a>

</div>

<?php if(session()->getFlashdata('success')) : ?>

<div class="alert alert-success">

<?= session()->getFlashdata('success'); ?>

</div>

<?php endif; ?>

<table class="table align-middle">

<thead>

<tr>

<th>Gambar</th>

<th>Produk</th>

<th>Kategori</th>

<th>Harga</th>

<th>Stok</th>

<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

<?php foreach($products as $row): ?>

<tr>

<td>

<?php if($row['image']) : ?>

<img src="<?= base_url('assets/uploads/'.$row['image']); ?>">

<?php else : ?>

<img src="https://picsum.photos/100">

<?php endif; ?>

</td>

<td>

<b><?= esc($row['name']) ?></b>

</td>

<td>

<?= esc($row['category_id']) ?>

</td>

<td>

Rp <?= number_format($row['price'],0,',','.') ?>

</td>

<td>

<?= $row['stock'] ?>

</td>

<td>

<a href="/admin/products/edit/<?= $row['id'] ?>" class="btn btn-outline-dark btn-sm">

Edit

</a>

<a href="/admin/products/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm"

onclick="return confirm('Hapus produk?')">

Hapus

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</body>

</html>