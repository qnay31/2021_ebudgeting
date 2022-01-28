<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DataBase Laporan</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=database_program"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=program"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan Program</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- kesehatan depok -->
                    <?php if ($_GET["id_program"] == "kes_depok") { ?>
                    <?php include '../laporan/program_kes-depok.php'; ?>

                    <!-- pendidikan depok -->
                    <?php } elseif ($_GET["id_program"] == "pend_depok") { ?>
                    <?php include '../laporan/program_pend-depok.php'; ?>

                    <!-- pendidikan bogor -->
                    <?php } elseif ($_GET["id_program"] == "pend_bogor") { ?>
                    <?php include '../laporan/program_pend-bogor.php'; ?>

                    <!-- kesehatan bogor -->
                    <?php } elseif ($_GET["id_program"] == "kes_bogor") { ?>
                    <?php include '../laporan/program_kes-bogor.php'; ?>

                    <?php } elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {?>
                    <?php include '../laporan/program_kes-depok.php'; ?>

                    <?php } elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Depok") {?>
                    <?php include '../laporan/program_pend-depok.php'; ?>

                    <?php } elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Bogor") {?>
                    <?php include '../laporan/program_kes-bogor.php'; ?>

                    <?php } elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Bogor") {?>
                    <?php include '../laporan/program_pend-bogor.php'; ?>

                    <?php } elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Bogor") {?>
                    <?php include '../laporan/program_bogor.php'; ?>

                    <?php } elseif ($pengurus_id == "kepala_cabang" && $_SESSION['cabang'] == "Bogor") {?>
                    <?php include '../laporan/program_bogor.php'; ?>

                    <!-- depok bogor -->
                    <?php } else { ?>
                    <?php include '../laporan/program_depok.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>