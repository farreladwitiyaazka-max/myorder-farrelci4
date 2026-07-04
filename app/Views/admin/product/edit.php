<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Produk</h2>

<form action="/admin/products/update/<?= $product['id']; ?>" method="post" enctype="multipart/form-data">

<div class="mb-3">

<label>Nama Produk</label>

<input
type="text"
name="name"
class="form-control"
value="<?= esc($product['name']); ?>">

</div>

<div class="mb-3">

<label>Kategori</label>

<select name="category_id" class="form-control">

<?php foreach($categories as $c): ?>

<option
value="<?= $c['id']; ?>"
<?= $c['id']==$product['category_id'] ? 'selected':''; ?>>

<?= esc($c['name']); ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="description"
class="form-control"><?= esc($product['description']); ?></textarea>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="price"
class="form-control"
value="<?= $product['price']; ?>">

</div>

<div class="mb-3">

<label>Stok</label>

<input
type="number"
name="stock"
class="form-control"
value="<?= $product['stock']; ?>">

</div>

<div class="mb-3">

<label>Gambar Lama</label><br>

<img
src="<?= base_url('assets/uploads/'.$product['image']); ?>"
width="150"
class="img-thumbnail">

</div>

<div class="mb-3">

<label>Ganti Gambar</label>

<input
type="file"
name="image"
class="form-control">

</div>

<button class="btn btn-primary">

Update

</button>

<a href="/admin/products" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</body>

</html>