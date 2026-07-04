<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login - MyOrder</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#f2f2f2;

    background-image:url("https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=1800");

    background-size:cover;

    background-position:center;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:Arial, Helvetica, sans-serif;

}

.overlay{

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:rgba(0,0,0,.45);

}

.login-box{

    position:relative;

    z-index:10;

    width:420px;

    background:#fff;

    border-radius:20px;

    padding:45px;

    text-align:center;

    box-shadow:0 15px 40px rgba(0,0,0,.35);

}

.logo{

    font-size:38px;

    font-weight:bold;

    margin-bottom:10px;

    color:#000;

}

.sub{

    color:#666;

    margin-bottom:35px;

}

.form-control{

    height:55px;

    border-radius:12px;

    margin-bottom:20px;

}

.btn-login{

    width:100%;

    height:55px;

    border:none;

    border-radius:12px;

    background:#000;

    color:#fff;

    font-size:18px;

    transition:.3s;

}

.btn-login:hover{

    background:#222;

}

.footer{

    margin-top:25px;

    color:#777;

    font-size:14px;

}

</style>

</head>

<body>

<div class="overlay"></div>

<div class="login-box">

<div class="logo">

MYORDER

</div>

<p class="sub">

Silakan masuk untuk melanjutkan

</p>

<?php if(session()->getFlashdata('error')) : ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error'); ?>

</div>

<?php endif; ?>

<form action="/login" method="post">

<input

type="text"

name="username"

class="form-control"

placeholder="Masukkan Username"

required>

<button class="btn-login">

Masuk

</button>

</form>

<div class="footer">

Furniture Modern Indonesia

</div>

</div>

</body>

</html>