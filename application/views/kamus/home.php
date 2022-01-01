<div class="container mt-3 isi">
    <div class="row pt-3">
        <div class="col text-center">
            <h4>Kamus Sunda - Indonesia</h4>
        </div>
    </div>
    <br>

    <div class="row mb-3">
        <div class="col-md-8 offset-md-2 text-center">
            <form class="sercing" method="GET" action="<?= base_url('kamus/index/') ?>">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required value="<?= $katacari ?>">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row hasilsrc p-3">
        <div class="col-md bkolom">
            <table class="table table-hover tabel">
                <thead class="tabel-header">
                    <tr>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_GET)) :
                        foreach ($cari as $cari) : ?>
                            <tr>
                                <td class="kata"><?= $cari['words']; ?></td>
                                <td><?= $cari['arti_bahasa']; ?></td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <h3 class="text-center">Singkatan</h3>
    <div class="row mb-1 p-3">
        <div class="col-md-4">
            <table class="table table-hover tabel tabel-sk">
                <thead>
                    <tr>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($singkatan as $skt) :
                        if ($skt['id'] <= 8) : ?>
                            <tr>
                                <td><?= $skt['singkat']; ?></td>
                                <td><?= $skt['arti_full']; ?></td>
                            </tr>
                    <?php endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-hover tabel tabel-sk">
                <thead>
                    <tr>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($singkatan as $skt) :
                        if ($skt['id'] > 8 && $skt['id'] <= 16) : ?>
                            <tr>
                                <td><?= $skt['singkat']; ?></td>
                                <td><?= $skt['arti_full']; ?></td>
                            </tr>
                    <?php endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-hover tabel tabel-sk">
                <thead>
                    <tr>
                        <th scope="col">Kata</th>
                        <th scope="col">Arti Kata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($singkatan as $skt) :
                        if ($skt['id'] > 16 && $skt['id'] <= 24) : ?>
                            <tr>
                                <td><?= $skt['singkat']; ?></td>
                                <td><?= $skt['arti_full']; ?></td>
                            </tr>
                    <?php endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="text-center">Kata Sunda</h3>
    <div class="row rbawah">
        <?php foreach ($kamus as $kms) : ?>
            <div class="col-md-2 mt-1 mb-1">
                <a href="<?= base_url('kamus/index/?cari=') . $kms['words']; ?>"><?= $kms['words']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row mt-1 pb-3">
        <div class="col text-center">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

</div>