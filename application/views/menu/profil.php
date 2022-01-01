<div class="container isi">
    <div class="row">
        <div class="col">
            <h3><?= $title; ?></h3>
            <hr>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-3 col-profil">
            <div class="profil-user">
                <form action="<?= base_url('menu/ubahFotoProfil') ?>" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <img class="gambar-profil rounded-circle" src="<?= base_url('assets/img/profil/') . $user['gambar']; ?>" alt="">
                    <div class="icon-wrapper">
                        <input type="hidden" name="profil_lama" value="<?= $user['gambar']; ?>">
                        <i class="fas fa-upload fa-3x"></i>
                        <input type="file" onchange="this.form.submit()" name="myFile">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <p>
                <hr>
                Nama User : <?= $user['nama']; ?>
                <hr>
                Email : <?= $user['email']; ?>
                <hr>
                Level : <?= $user['level']; ?>
                <hr>
            </p>
            <a href="" class="tampilModalUbah" data-toggle="modal" data-target="#formPass" data-id="<?= $user['id']; ?>"><button>Ganti Password</button></a>
            <a href="" class=" float-right tampilModalUbah" data-toggle="modal" data-target="#formUdanE" data-id="<?= $user['id']; ?>"><button>Ubah Nama</button></a>
        </div>
    </div>
    <hr>

</div>

<!-- Modal nama user -->
<div class="modal fade" id="formUdanE" tabindex="-1" role="dialog" aria-labelledby="formUdanELabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formUdanELabel">Ubah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-profil">
                <form action="<?= base_url('menu/ubahProfil?ubah=nama') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Password -->
<div class="modal fade" id="formPass" tabindex="-1" role="dialog" aria-labelledby="formPassLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formPassLabel">Ubah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-profil">
                <form action="<?= base_url('menu/ubahProfil?ubah=password') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="form-group">
                        <label for="passlama">Password lama</label>
                        <input type="password" class="form-control" id="passlama" name="passlama" required>
                    </div>
                    <div class="form-group">
                        <label for="passbaru">Password baru</label>
                        <input type="password" class="form-control" id="passbaru" name="passbaru" required pattern=".{6,}">
                    </div>
                    <div class="form-group">
                        <label for="passbaru2">Repeat password</label>
                        <input type="password" class="form-control" id="passbaru2" name="passbaru2" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>