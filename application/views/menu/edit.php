<div class="container isi">
    <!-- Text Atas -->
    <div class="row">
        <div class="col">
            <h3><?= $title ?></h3>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- End Text Atas -->
    <hr>
    <h4 class="text-center mb-3">Kamus Sunda - Indonesia</h4>
    <!-- search -->
    <div class="row mb-3">
        <div class="col-md-6 offset-3 text-center ">
            <form class="sercing" method="POST" action="<?= base_url('menu/edit/') ?>">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" name="cari" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <p class="hasilcari">Hasil pencarian : <?php if (isset($_POST["cari"])) {
                                                        echo $cari;
                                                    } ?></p>
        </div>
    </div>
    <br>
    <button type="button" class="btn btn-primary m-2 tombolTambahData" data-toggle="modal" data-target="#formModal">Tambah Kata</button>
    <br>
    <!-- search -->

    <!-- isi conter -->
    <div class="row mb-3">
        <div class="col-md">
            <table class="table table-hover tabel">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kamus as $kms) : ?>
                        <tr>
                            <th scope="row"><?= $kms['id_vocab']; ?></th>
                            <td><?= $kms['words']; ?></td>
                            <td><?= $kms['arti_bahasa']; ?></td>
                            <td><a href="<?= base_url('menu/ubahData/' . $kms['id_vocab']); ?>" class="badge badge-success tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $kms['id_vocab']; ?>">Edit</a> </td>
                            <td><a href="<?= base_url('menu/hapusData/' . $kms['id_vocab']); ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ingin menghapus kata < <?= $kms['words']; ?> >?');">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end isi conter -->
</div>

<!-- Modal Tambah Kata-->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Kata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- isi -->
                <form action="<?= base_url('menu/tambahData') ?>" method="post">
                    <input type="hidden" name="id_vocab" id="id_vocab">
                    <div class="form-group">
                        <label for="words">Kata</label>
                        <input type="text" class="form-control" id="words" name="words" placeholder="Kata Dalam Bahasa Sunda">
                    </div>
                    <div class="form-group">
                        <label for="arti">Arti</label>
                        <textarea id="arti" class="form-control ck-editor__editable" name="arti" placeholder="Arti Dalam Bahasa Indonesia"></textarea>
                    </div>
                    <!-- end isi -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>