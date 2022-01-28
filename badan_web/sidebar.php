<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <?php if ($pengurus_id == "kepala_logistik") { ?>
    <?php if ($linkid_logistik == '' ) { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $_SESSION["username"] ?>.php">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } else { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>
    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php if ($linkid_cashback == '') { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $_SESSION["username"] ?>.php">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } else { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>

    <?php } elseif ($_SESSION["posisi"] == "Logistik Gedung Taman") { ?>
    <?php if ($linkid_taman == "") { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $_SESSION["username"] ?>.php">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } else { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>

    <?php } else { ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $_SESSION["username"] ?>.php">
        <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_favicon.png" alt="" style="width: 4em;">
        </div>
        <div class="sidebar-brand-text">e-Budgeting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>

    <?php if ($pengurus_id == "ap_pendidikan") { ?>
    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php } elseif ($pengurus_id == "humas") { ?>
    <?php } elseif ($pengurus_id == "kepala_admin") { ?>
    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php if ($linkid_logistik == '') { ?>
    <?php } else { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php } ?>
    <?php } else { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php } ?>

    <!-- Nav Item - input Collapse Menu -->
    <?php if ($pengurus_id == "ketua_yayasan") { ?>
    <?php } elseif ($pengurus_id == "ap_pendidikan") { ?>
    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php } elseif ($pengurus_id == "humas") { ?>
    <?php } elseif ($pengurus_id == "kepala_sekolah") { ?>
    <?php } elseif ($pengurus_id == "kepala_admin") { ?>
    <?php } elseif ($pengurus_id == "logistik") { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>

                <!-- form pengajuan -->
                <?php if ($linkid_taman == "operasional_yayasan") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=input_operasional">&nbsp;RAB
                    &
                    Laporan</a>
                <?php } else { ?>
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=input_logistik">&nbsp;RAB &
                    Laporan</a>
                <?php } ?>

            </div>
        </div>
    </li>
    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php if ($linkid_logistik == '') { ?>
    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>

                <!-- form pengajuan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=input_<?= $linkid_logistik ?>">&nbsp;RAB
                    &
                    Laporan</a>
            </div>
        </div>
    </li>
    <?php } ?>

    <?php } elseif ($pengurus_id == "kepala_humas") { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>

                <!-- form pengajuan -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=input_humas">&nbsp;RAB &
                    Laporan</a>
            </div>
        </div>
    </li>
    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEdit" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Edit</span>
        </a>
        <div id="collapseEdit" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Edit :</h6>

                form pengajuan
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_edit=gabung_income">&nbsp;Gabungkan
                    Income</a>
            </div>
        </div>
    </li> -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>
                <?php if ($linkid_cashback == '') { ?>
                <!-- form pengajuan -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=input_income">&nbsp;Pemasukan
                    Akun</a>
                <?php } else { ?>
                <!-- cash back -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_input=input_cashback">&nbsp;Cashback</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>

                <!-- form pengajuan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=input_produksi">&nbsp;Produksi</a>
            </div>
        </div>
    </li>

    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Input :</h6>

                <!-- form pengajuan -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=input_program">&nbsp;RAB &
                    Laporan</a>

                <?php if ($pengurus_id == "kepala_program") { ?>
                <!-- form yatim -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_content=content">&nbsp;Data
                    Yatim</a>
                <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
                <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
                <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
                <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
                <?php } elseif ($pengurus_id == "logistik") { ?>

                <?php } else { ?>
                <!-- form humas income -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_content=content">&nbsp;Pemasukan</a>

                <!-- form kepala sekolah -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_content=content">&nbsp;Guru</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <?php } ?>

    <!-- Nav Item - income Collapse Menu -->
    <?php if ($pengurus_id == "kepala_program") { ?>
    <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
    <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php } elseif ($pengurus_id == "logistik") { ?>
    <?php } elseif ($pengurus_id == "ap_pendidikan") { ?>
    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php } elseif ($pengurus_id == "kepala_sekolah") { ?>
    <?php } elseif ($pengurus_id == "humas") { ?>
    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <?php } elseif ($pengurus_id == "kepala_admin") { ?>
    <?php } elseif ($pengurus_id == "ketua_yayasan") { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $_SESSION["username"] ?>.php?id_data=pengurus" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pengurus</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIncome" aria-expanded="true"
            aria-controls="collapseIncome">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Pemasukan</span>
        </a>
        <div id="collapseIncome" class="collapse" aria-labelledby="headingIncome" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Pemasukan :</h6>
                <!-- humas -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_celengan">&nbsp;Humas</a>
                <!-- gedung -->
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_income">&nbsp;Media
                    Sosial</a>

                <!-- Cashback -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_cashback">&nbsp;Cashback</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengeluaran"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-coins"></i>
            <span>Pengeluaran</span>
        </a>
        <div id="collapsePengeluaran" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Pengeluaran :</h6>
                <!-- aset -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_aset">&raquo;&nbsp;Aset
                    Yayasan</a>
                <!-- uang makan -->
                <!-- <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_makan">&nbsp;Uang
                    Makan</a> -->
                <!-- gaji karyawan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_gaji">&raquo;&nbsp;Gaji
                    Karyawan</a>
                <!-- operasional -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_operasional">&raquo;&nbsp;Operasional
                    Yayasan</a>
                <!-- pengeluaran lainnya -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_lainnya">&raquo;&nbsp;Dan
                    Lain Lain</a>

                <!-- Produksi -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_produksi">&raquo;&nbsp;Produksi</a>

                <!-- Maintenance -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_maintenance">&raquo;&nbsp;Maintenance</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <!-- database -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedatabase"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Database</span>
        </a>
        <div id="collapsedatabase" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Pengeluaran :</h6>
                <!-- program -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_program">&rtrif;&nbsp;Program</a>

                <!-- baksos -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=database_baksos">&rtrif;&nbsp;Bakti
                    Sosial</a>

                <!-- logistik -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_logistik">&rtrif;&nbsp;Logistik</a>

                <!-- humas -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_humas">&rtrif;&nbsp;Humas</a>

                <!-- Gaji Karyawan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_gaji">&rtrif;&nbsp;Gaji
                    Karyawan</a>

                <!-- Aset Yayasan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_aset">&rtrif;&nbsp;Aset
                    Yayasan</a>

                <!-- Operasional Yayasan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_operasional">&rtrif;&nbsp;Operasional
                    Yayasan</a>

                <!-- Anggaran Lainnya -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_lainnya">&rtrif;&nbsp;Anggaran Lainnya</a>

                <!-- Produksi Lele -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi">&rtrif;&nbsp;Produksi</a>

                <!-- Maintenance -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=global_maintenance">&rtrif;&nbsp;Maintenance</a>

                <h6 class="collapse-header">List Pemasukkan :</h6>
                <!-- Income Humas -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=database_income">&rtrif;&nbsp;Income Humas</a>

                <!-- Income Media Sosial -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=database_media">&rtrif;&nbsp;Income
                    Media Sosial</a>

                <!-- Cashback -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_database=database_cashback">&rtrif;&nbsp;Cashback</a>
            </div>
        </div>
    </li>
    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIncome" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Pemasukan</span>
        </a>
        <div id="collapseIncome" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Pemasukan :</h6>

                <!-- celengan -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pemasukan=pemasukan_celengan">&nbsp;Celengan</a>

                <!-- kotak amal -->
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_pemasukan=pemasukan_kotak amal">&nbsp;Kotak Amal</a>

            </div>
        </div>
    </li>
    <?php } ?>

    <!-- Nav Item - daily Collapse Menu -->
    <?php if ($pengurus_id == "kepala_logistik") { ?>
    <?php } elseif ($pengurus_id == "logistik") { ?>
    <?php } elseif ($pengurus_id == "ap_pendidikan") { ?>
    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <?php } elseif ($pengurus_id == "kepala_admin") { ?>
    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Daily Report</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Daily:</h6>
                <?php if ($pengurus_id == "ketua_yayasan") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">&nbsp;Program</a>
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=daily_humas">&nbsp;Humas</a>
                <?php } elseif ($pengurus_id == "kepala_program") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">&nbsp;Program</a>

                <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">&nbsp;Program</a>

                <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">&nbsp;Program</a>

                <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
                <a class="collapse-item"
                    href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">&nbsp;Program</a>

                <?php } else { ?>
                <a class="collapse-item" href="<?= $_SESSION["username"] ?>.php?id_input=daily_humas">&nbsp;Humas</a>
                <?php } ?>
            </div>
        </div>
    </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <?php if ($pengurus_id == "ketua_yayasan") { ?>
    <div class="sidebar-heading">
        Checklist
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_check=check_global">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>RAB & Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        New Fitur
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item" data-toggle="tooltip" data-placement="right"
        title="Fitur ini merupakan redirect menuju halaman admin dari dompetdonasi.com">
        <a class="nav-link" href="../../admin_dompet/">
            <i class="fas fa-fw fa-link"></i>
            <span>Dompetdonasi</span></a>
    </li>

    <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
    <div class="sidebar-heading">
        Checklist
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_check=check_cabang">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>RAB & Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <?php } elseif ($pengurus_id == "kepala_program" && $_SESSION["cabang"] == "Depok") { ?>
    <div class="sidebar-heading">
        Checklist
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_check=check_program">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>RAB & Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php if ($linkid_logistik == '') { ?>
    <div class="sidebar-heading">
        Checklist
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $_SESSION["username"] ?>.php?id_check=check_logistik">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>RAB & Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php } else { ?>
    <?php } ?>

    <?php } ?>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>