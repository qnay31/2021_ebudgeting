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
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_lainnya"> <small
                                class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_lainnya"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan Biaya Lainnya</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- rincian -->
                    <?php if ($_GET["id_lainnya"] == "rincian") { ?>
                    <?php include '../laporan/lainnya/rincian.php'; ?>

                    <!-- lainnya global -->
                    <?php } else { ?>
                    <?php include '../laporan/lainnya/global.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>