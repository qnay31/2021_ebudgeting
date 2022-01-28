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
                    <?php if ($pengurus_id == "kepala_cabang") { ?>
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=kacab_logistik"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=kacab_logistik"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_logistik"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_logistik"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan Logistik</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- global -->
                    <?php if ($_GET["id_logistik"] == "log_bogor") { ?>
                    <?php include '../laporan/logistik_bogor.php'; ?>

                    <!-- program depok -->
                    <?php } elseif ($_GET["id_logistik"] == "log_depok") { ?>
                    <?php include '../laporan/logistik_depok.php'; ?>

                    <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
                    <?php include '../laporan/logistik_bogor.php'; ?>

                    <!-- pendidikan bogor -->
                    <?php } else { ?>
                    <?php include '../laporan/logistik_global.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>