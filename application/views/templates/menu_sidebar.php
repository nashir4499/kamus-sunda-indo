<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Halo <?= $user['level'] ?></div>
    </a>
    <br>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item <?= ($this->uri->segment(2) === 'index') ? 'active' : '' ?> <?= ($this->uri->segment(2) === null) ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('menu/index') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item Profil -->
    <li class="nav-item <?= ($this->uri->segment(2) === 'profil') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('menu/profil') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>

    <!-- Nav Item - Edit -->
    <li class="nav-item <?= ($this->uri->segment(2) === 'edit') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('menu/edit') ?>">
            <i class="fas fa-fw fa-pen"></i>
            <span>Edit Kamus</span></a>
    </li>

    <!-- Nav Item Users -->
    <li class="nav-item <?= ($this->uri->segment(2) === 'users') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('menu/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->