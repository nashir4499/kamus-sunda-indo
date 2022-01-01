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
    <br>
    <!-- isi conter -->
    <div class="row mb-3">
        <div class="col-md">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Level</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $usr) : ?>
                        <tr>
                            <th scope="row"><?= $usr['id']; ?></th>
                            <td><?= $usr['nama']; ?></td>
                            <td><?= $usr['email']; ?></td>
                            <td><img src="<?= base_url('assets/img/profil/' . $usr['gambar']); ?>" alt="" width="50px"></td>
                            <td><?= $usr['level']; ?></td>
                            <td><?php if ($usr['aktif'] == 1) {
                                    echo "Aktif";
                                } else {
                                    echo "Tidak Aktif";
                                } ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end isi conter -->

</div>