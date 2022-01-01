                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 text-gray-800 text-center mt-5">Selamat Datang</h1>
                    <h1 class="h4 text-gray-800 text-center"><?= $user['nama'] ?></h1>
                    <h1 class="h5 text-gray-800 text-center">Silahkan pilih menu disamping atau dibawah ini!</h1>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <br>

                    <div class="row justify-content-md-center mt-5">
                        <div class="col-md-6 text-right">
                            <a href="<?= base_url('menu/profil') ?>"><button type="button" class="btn btn-success pl-5 pr-5">Profil</button></a>
                        </div>
                        <div class="col-md-6 text-left">
                            <a href="<?= base_url('menu/edit') ?>"><button type="button" class="btn btn-primary pl-4 pr-4">Edit Kamus</button></a>
                        </div>
                    </div>

                    <div class="row justify-content-md-center mt-5 mb-5">
                        <div class="col-md-6 text-right">
                            <a href="<?= base_url('menu/users') ?>"><button type="button" class="btn btn-warning pl-4 pr-4">User List</button></a>
                        </div>
                        <div class="col-md-6 text-left">
                            <a href="" data-toggle="modal" data-target="#logoutModal"><button type="button" class="btn btn-danger pl-4 pr-4">Logout</button></a>
                        </div>
                    </div>

                    <br>
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->