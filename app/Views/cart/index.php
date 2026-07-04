<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Keranjang | MyOrder</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fafafa;
    font-family:'Segoe UI',sans-serif;
}

.container{
    margin-top:60px;
}

.box{

    background:#fff;

    padding:35px;

    border-radius:25px;

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

.qty-btn{

    width:38px;

}

.total{

    font-size:28px;

    font-weight:bold;

}

</style>

</head>

<body>

<div class="container">

<div class="box">

<h2 class="mb-4">

🛒 Keranjang Belanja

</h2>

<table class="table align-middle">

<thead>

<tr>

<th></th>

<th>Produk</th>

<th>Harga</th>

<th width="170">Jumlah</th>

<th>Subtotal</th>

<th></th>

</tr>

</thead>

<tbody>

<?php $total=0; ?>

<?php foreach($cart as $c): ?>

<?php $sub=$c['price']*$c['qty']; ?>

<?php $total+=$sub; ?>

<tr>

<td>

<img src="https://picsum.photos/seed/<?= $c['product_id'] ?>/300">

</td>

<td>

<?= esc($c['name']) ?>

</td>

<td>

Rp <?= number_format($c['price'],0,',','.') ?>

</td>

<td>

<a href="/cart/minus/<?= $c['id'] ?>" class="btn btn-outline-dark qty-btn">-</a>

<span class="mx-2">

<?= $c['qty'] ?>

</span>

<a href="/cart/plus/<?= $c['id'] ?>" class="btn btn-dark qty-btn">+</a>

</td>

<td>

Rp <?= number_format($sub,0,',','.') ?>

</td>

<td>

<a href="/cart/delete/<?= $c['id'] ?>" class="btn btn-outline-danger">

Hapus

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<hr>

<div class="d-flex justify-content-between align-items-center">

<div class="total">

Total

Rp <?= number_format($total,0,',','.') ?>

</div>

<div>

<a href="/" class="btn btn-outline-dark">

Lanjut Belanja

</a>

<a href="/checkout" class="btn btn-dark">

Checkout

</a>

</div>

</div>

</div>

</div>

</body>

</html>