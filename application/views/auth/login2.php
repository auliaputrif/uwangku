<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url('assets/img/logo.png'); ?>" rel="shortcut icon">
  <link href='https://fonts.googleapis.com/css?family=Radio Canada' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <style>
    * {
      box-sizing: border-box;
    }

    @import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


    body {
      font-family: 'Radio Canada';
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .left {
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;
      justify-content: center;
      animation-name: left;
      animation-duration: 1s;
      animation-fill-mode: both;
      animation-delay: 1s;
    }

    .right {
      flex: 1;
      background-color: black;
      transition: 1s;
      background-image: url(https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .header>h2 {
      margin: 0;
      color: #FD982E;
    }

    .header>h4 {
      margin-top: 10px;
      font-weight: normal;
      font-size: 15px;
      color: #FD982E;
    }

    .form {
      max-width: 80%;
      display: flex;
      flex-direction: column;
    }

    .form>p {
      text-align: right;
    }

    .form>p>a {
      color: #FD982E;
      font-size: 14px;
    }

    .form-field {
      height: 46px;
      padding: 0 16px;
      border: 2px solid #ddd;
      border-radius: 4px;
      font-family: 'Rubik', sans-serif;
      outline: 0;
      transition: .2s;
      margin-top: 20px;
    }

    .form-field:focus {
      border-color: #FD982E;
    }

    .form>button {
      padding: 12px 10px;
      border: 0;
      background: linear-gradient(to right, #FD982E 0%, #5100FD 100%);
      border-radius: 25px;
      margin-top: 10px;
      color: #fff;
      letter-spacing: 1px;
      font-size: 12px;
      font-weight: bold;
    }

    .animation {
      animation-name: move;
      animation-duration: .4s;
      animation-fill-mode: both;
      animation-delay: 2s;
    }

    .a0 {
      animation-delay: 1.9s;
    }

    .a1 {
      animation-delay: 2s;
    }

    .a2 {
      animation-delay: 2.1s;
    }

    .a3 {
      animation-delay: 2.2s;
    }

    .a4 {
      animation-delay: 2.3s;
    }

    .a5 {
      animation-delay: 2.4s;
    }

    .a6 {
      animation-delay: 2.5s;
    }

    .a7 {
      animation-delay: 2.6s;
    }

    .a8 {
      animation-delay: 2.7s;
    }

    @keyframes move {
      0% {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-40px);
      }

      100% {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }
    }

    @keyframes left {
      0% {
        opacity: 0;
        width: 0;
      }

      100% {
        opacity: 1;
        padding: 20px 40px;
        width: 440px;
      }
    }
  </style>

  <div class="container">
    <div class="left">
      <div class="header">
        <?= $this->session->flashdata('pesan'); ?>
        <h2 class="animation a1">Selamat Datang Kembali</h2>
      </div>
      <form method="post" action="<?= site_url('auth'); ?>">
        <div class="form">
          <input type="email" name="email" class="form-field animation a3" placeholder="Masukkan Email..." value="<?= set_value('email') ?>" required>
          <?= form_error('email', '<small class="animation a4 text-danger pl-3">', '</small>'); ?>
          <input type="password" name="password" class="form-field animation a5" placeholder="Password" required>
          <?= form_error('password', '<small class="animation a6 text-danger pl-3">', '</small>'); ?>
          <p class="animation a7">Belum Punya Akun? <a href="<?= site_url('auth/registrasi'); ?>">Daftar</a></p>
          <button type="submit" class="animation a8">LOGIN</button>
        </div>
      </form>
    </div>
    <div class="right"></div>
  </div>

</body>

</html>