<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyOrder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
    background:#ffffff;
    font-family:'Segoe UI',sans-serif;
}

.navbar{
    background:#ffffff;
    border-bottom:1px solid #ececec;
    box-shadow:0 3px 10px rgba(0,0,0,.03);
}

.navbar-brand{

    color:#000 !important;

    font-size:30px;

    font-weight:700;

}

.nav-link{

    color:#000 !important;

    font-weight:500;

}

.hero{

    background:#fff;

    border-radius:30px;

    padding:50px;

    margin-bottom:45px;

    box-shadow:0 8px 30px rgba(0,0,0,.05);

}

.card{

    border:none;

    border-radius:22px;

    overflow:hidden;

    transition:.35s;

    box-shadow:0 8px 20px rgba(0,0,0,.06);

}

.card:hover{

    transform:translateY(-8px);

    box-shadow:0 18px 35px rgba(0,0,0,.12);

}

.card img{

    height:250px;

    object-fit:cover;

}

.card-body{

    padding:22px;

}

.card h5{

    font-weight:700;

}

.price{

    color:#000;

    font-size:24px;

    font-weight:bold;

}

.btn-primary{

    background:#000;

    border:none;

    border-radius:14px;

    height:48px;

    transition:.3s;

}

.btn-primary:hover{

    background:#222;

}

.btn-outline-dark{

    border-radius:14px;

}

.form-control{

    border-radius:15px;

    height:48px;

}

.input-group .btn{

    border-radius:15px;

}
.btn-dark,
.btn-primary{

    background:#111;

    border:none;

    border-radius:15px;

}

.btn-dark:hover,
.btn-primary:hover{

    background:#333;

}
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="/">

MYORDER.

</a>

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="/">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/cart">Keranjang</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/login">Login</a>
</li>

</ul>

</div>

</nav>

<div class="container mt-5">

<?php if(session()->getFlashdata('success')) : ?>

<div class="alert alert-dark alert-dismissible fade show mb-4">

<strong>Berhasil!</strong>

<?= session()->getFlashdata('success'); ?>

<button
type="button"
class="btn-close"
data-bs-dismiss="alert">
</button>

</div>

<?php endif; ?>

<div class="hero">

<h1 style="font-weight:700">

Furniture Modern
untuk Rumah Impian

</h1>

<p class="text-secondary mt-3">

Temukan berbagai produk pilihan dengan desain minimalis,
modern, dan elegan.

</p>

</div>

<form method="get" action="/" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Cari produk..."
            value="<?= esc($_GET['keyword'] ?? '') ?>">

        <button class="btn btn-dark">

        Cari

        </button>

    </div>

</form>

<form method="get" action="/" class="mb-4">

    <div class="row">

        <div class="col-md-4">

            <select name="kategori" class="form-select">

                <option value="">Semua Kategori</option>

                <?php foreach($categories as $c): ?>

                <option value="<?= $c['id']; ?>">

                    <?= esc($c['name']); ?>

                </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-2">

            <button class="btn btn-dark w-100">

                Filter

            </button>

        </div>

    </div>

</form>

<div class="row">

<?php if(!empty($products)): ?>

<?php foreach($products as $product): ?>

<div class="col-md-3 mb-4">

<div class="card h-100">

    <img
        src="https://picsum.photos/seed/<?= $product['id']; ?>/500/400"
        class="card-img-top">

    <div class="card-body">

        <h5 class="mb-3">

            <?= esc($product['name']); ?>

        </h5>

        <p class="text-muted">

            <?= esc($product['description']); ?>

        </p>

        <p class="price">

            Rp <?= number_format($product['price'],0,',','.'); ?>

        </p>

        <p>

            Stok :
            <b><?= esc($product['stock']); ?></b>

        </p>

        <button
            class="btn btn-primary w-100 add-cart"
            data-id="<?= $product['id']; ?>">

            Tambah ke Keranjang

        </button>

    </div>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="col-12">

<div class="alert alert-warning">

Belum ada produk.

</div>

</div>

<?php endif; ?>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(".add-cart").click(function(){

    let id = $(this).data("id");

    $.ajax({

        url:"/cart/add/"+id,

        type:"POST",

        success:function(res){

            alert(res.message);

        }

    });

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>