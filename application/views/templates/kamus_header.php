<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/tampilan.css'); ?>">

    <title><?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('kamus/') ?>">Kamus<i class="fas fa-book-reader"></i>S&I</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?= ($this->uri->segment(2) === 'index') ? 'active' : '' ?> <?= ($this->uri->segment(2) === null) ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('kamus/index') ?>"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item <?= ($this->uri->segment(2) === 'daftarKata') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('kamus/daftarKata') ?>"><i class="far fa-list-alt"></i> Daftar Kata</a>
                    </li>
                    <li class="nav-item <?= ($this->uri->segment(2) === 'tentang') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('kamus/tentang') ?>"><i class="fas fa-info-circle"></i> Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>