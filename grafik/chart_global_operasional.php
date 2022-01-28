<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grafik Laporan</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <?php if ($linkid_taman == "operasional_yayasan") { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_database=global_operasional">
                            <small>DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_grafik=global_operasional"><small
                                class="text-white">Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_operasional"> <small>DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_operasional"><small
                                class="text-white">Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Grafik Global Operasional Yayasan 2021</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartarea_operasional_global"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>