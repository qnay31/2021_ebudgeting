<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DataBase Income</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=database_media"> <small
                                class="text-white">
                                Global Income&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=harian_media"><small>
                                Harian Income&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=media"><small>Grafik
                                Income&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Income Global Media Sosial</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php include '../laporan/media_sosial/income_global.php'; ?>
                </div>
            </div>
        </div>
    </div>