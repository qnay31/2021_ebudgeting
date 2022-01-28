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
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_program"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_program"><small>Grafik
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
                    <!-- global -->
                    <?php if ($_GET["id_program"] == "pend_bogor") { ?>
                    <?php include '../laporan/program_pend-bogor.php'; ?>

                    <!-- program depok -->
                    <?php } elseif ($_GET["id_program"] == "program_depok") { ?>
                    <?php include '../laporan/program_depok.php'; ?>

                    <!-- program bogor -->
                    <?php } elseif ($_GET["id_program"] == "program_bogor") { ?>
                    <?php include '../laporan/program_bogor.php'; ?>

                    <!-- kesehatan depok -->
                    <?php } elseif ($_GET["id_program"] == "kes_depok") { ?>
                    <?php include '../laporan/program_kes-depok.php'; ?>

                    <!-- kesehatan bogor -->
                    <?php } elseif ($_GET["id_program"] == "kes_bogor") { ?>
                    <?php include '../laporan/program_kes-bogor.php'; ?>

                    <!-- pendidikan depok -->
                    <?php } elseif ($_GET["id_program"] == "pend_depok") { ?>
                    <?php include '../laporan/program_pend-depok.php'; ?>

                    <!-- pendidikan bogor -->
                    <?php } else { ?>
                    <?php include '../laporan/program_global.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>