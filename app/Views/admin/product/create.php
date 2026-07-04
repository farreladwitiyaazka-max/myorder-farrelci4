<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Produk | MyOrder Admin</title>

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

    color:#fff;

    text-align:center;

    margin-bottom:40px;

    font-weight:bold;

}

.sidebar a{

    display:block;

    color:#fff;

    text-decoration:none;

    padding:13px 15px;

    border-radius:12px;

    margin-bottom:10px;

    transition:.3s;

}

.sidebar a:hover{

    background:#fff;

    color:#111;

}

/* Content */

.content{

    margin-left:260px;

    padding:40px;

}

.card{

    border:none;

    border-radius:20px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.card-body{

    padding:35px;

}

.form-control,
.form-select{

    border-radius:12px;

    height:48px;

}

textarea.form-control{

    height:120px;

}

.btn-dark{

    border-radius:12px;

    padding:10px 22px;

}

.btn-outline-dark{

    border-radius:12px;

    padding:10px 22px;

}

h2{

    font-weight:700;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>MYORDER</h2>

<a href="/admin">Dashboard</a>

<a href="/admin/products">Produk</a>

<a href="/">Website</a>

<a href="/logout">Logout</a>

</div>
<!-- CONTENT -->

<div class="content">

<div class="container-fluid">

<div class="card">

<div class="card-body">

<h2 class="mb-4">

Tambah Produk

</h2>

<form action="/admin/products/store" method="post" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">

Nama Produk

</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Kategori

</label>

<select
name="category_id"
class="form-select">

<?php foreach($categories as $c): ?>

<option value="<?= $c['id'] ?>">

<?= esc($c['name']) ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Deskripsi

</label>

<textarea
name="description"
class="form-control"></textarea>

</div>

<div class="mb-3">

<label class="form-label">

Harga

</label>

<input
type="number"
name="price"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">

Stok

</label>

<input
type="number"
name="stock"
class="form-control">

</div>

<div class="mb-4">

<label class="form-label">

Upload Gambar

</label>

<input
type="file"
name="image"
class="form-control">

</div>

<button class="btn btn-dark">

💾 Simpan Produk

</button>

<a href="/admin/products" class="btn btn-outline-dark">

← Kembali

</a>

</form>

</div>

</div>

</div>

</div>

</body>

</html>