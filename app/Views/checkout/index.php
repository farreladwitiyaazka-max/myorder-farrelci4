<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Checkout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

    background:#f7f7f7;

    font-family:'Segoe UI',sans-serif;

}

.container{

    margin-top:60px;

}

.box{

    background:#fff;

    border-radius:25px;

    padding:40px;

    box-shadow:0 10px 30px rgba(0,0,0,.05);

}

.table{

    vertical-align:middle;

}

.total{

    font-size:30px;

    font-weight:bold;

}

.btn-dark{

    border-radius:12px;

    height:48px;

}

</style>

</head>

<body>

<div class="container">

<div class="box">

<h2>

Checkout

</h2>

<hr>

<table class="table">

<thead>

<tr>

<th>Produk</th>

<th>Harga</th>

<th>Qty</th>

<th>Subtotal</th>

</tr>

</thead>

<tbody>

<?php

$total=0;

foreach($cart as $c):

$sub=$c['price']*$c['qty'];

$total+=$sub;

?>

<tr>

<td>

<?= esc($c['name']) ?>

</td>

<td>

Rp <?= number_format($c['price'],0,',','.') ?>

</td>

<td>

<?= $c['qty'] ?>

</td>

<td>

Rp <?= number_format($sub,0,',','.') ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<hr>

<div class="d-flex justify-content-between align-items-center">

<div class="total">

Rp <?= number_format($total,0,',','.') ?>

</div>

<form action="/checkout/process" method="post">

<button class="btn btn-dark px-5">

Bayar Sekarang

</button>

</form>

</div>

</div>

</div>

</body>

</html>