<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <?php if($pengurus_id == "ketua_yayasan"){ ?>
        <?php include 'notif.php'; ?>

        <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
        <?php include 'notif.php'; ?>

        <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
        <?php include 'notif.php'; ?>

        <?php } elseif ($pengurus_id == "kepala_program") { ?>
        <?php include 'notif.php'; ?>

        <?php } elseif ($pengurus_id == "kepala_humas") { ?>
        <?php include 'notif.php'; ?>

        <?php }else { ?>
        <?php include 'notif.php'; ?>

        <?php } ?>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama_user  ?></span>
                <img class="img-profile rounded-circle" src="../img/profil/<?= $profil  ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= $_SESSION["username"] ?>.php?id_topbar=profil">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="<?= $_SESSION["username"] ?>.php?id_topbar=setting">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <?php if($pengurus_id == "ketua_yayasan"){ ?>
                <a class="dropdown-item" href="<?= $_SESSION["username"] ?>.php?id_topbar=log">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <?php }else { ?>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>