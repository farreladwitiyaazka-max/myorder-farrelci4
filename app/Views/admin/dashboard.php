<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8f8f8;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#111;
    color:white;
    padding:30px 20px;
}

.sidebar h3{
    font-weight:bold;
    margin-bottom:40px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 15px;
    margin-bottom:10px;
    border-radius:12px;
    transition:.3s;
}

.sidebar a:hover{
    background:#fff;
    color:#111;
}

.content{
    margin-left:260px;
    padding:40px;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.card-body{
    padding:30px;
}

h1{
    font-weight:700;
}

</style>

</head>

<body>

<body>

<div class="sidebar">

<h2>MYORDER</h2>

<a href="/admin">Dashboard</a>

<a href="/admin/products">Produk</a>

<a href="/">Website</a>

<a href="/logout">Logout</a>

</div>

<div class="content">

<h1>Dashboard Admin</h1>

<p class="text-secondary mb-4">

Selamat datang,
<b><?= session()->get('username') ?></b>

</p>

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h3><?= $jumlahProduk ?? 0 ?></h3>

<p>Total Produk</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h3><?= $jumlahUser ?? 0 ?></h3>

<p>Total User</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h3><?= $jumlahOrder ?? 0 ?></h3>

<p>Total Order</p>

</div>

</div>

</div>

</div>

</div>

</body>

</html>