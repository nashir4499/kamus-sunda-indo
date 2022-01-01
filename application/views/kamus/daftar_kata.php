<div class="container mt-3 isi">
    <h3 class=" text-center mt-5 mb-5 pt-3">List Seluruh Kata Yang Tersedia</h3>
    <div class="row mb-3 p-3">
        <div class="col-md">
            <table class="table table-hover tabel">
                <thead class="tabel-header">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kamus as $kms) : ?>
                        <tr>
                            <th scope="row"><?= $kms['id_vocab']; ?></th>
                            <td class="kata-df"><?= $kms['words']; ?></td>
                            <td><?= $kms['arti_bahasa']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>