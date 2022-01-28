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
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_humas"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_humas"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan Humas</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- humas bogor -->
                    <?php if ($_GET["id_humas"] == "log_bogor") { ?>
                    <?php include '../laporan/humas_bogor.php'; ?>

                    <!-- humas depok -->
                    <?php } elseif ($_GET["id_humas"] == "log_depok") { ?>
                    <?php include '../laporan/humas_depok.php'; ?>

                    <!-- kepala humas depok -->
                    <?php } elseif ($pengurus_id == "kepala_humas" && $_SESSION["cabang"] == "Depok") { ?>
                    <?php include '../laporan/humas_depok.php'; ?>

                    <!-- humas depok -->
                    <?php } elseif ($pengurus_id == "humas" && $_SESSION["cabang"] == "Depok") { ?>
                    <?php include '../laporan/humas_depok.php'; ?>

                    <!-- humas global -->
                    <?php } else { ?>
                    <?php include '../laporan/humas_global.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>