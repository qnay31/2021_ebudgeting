<?php if ($pengurus_id == "ketua_yayasan") { ?>

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
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_database=global_program"> <small>DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_program"><small
                                class="text-white">Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Grafik Global Program</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartarea_content_ketua_yayasan_total"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Grafik Program Depok</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartarea_content_kepala_program_depok"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Grafik Program Bogor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartarea_content_kepala_program_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Depok</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_kesehatan_depok"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Bogor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_kesehatan_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Depok</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_pendidikan_depok"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Bogor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_pendidikan_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } else { ?>
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
                        <li class="page-item"><a class="page-link"
                                href="<?= $_SESSION["username"] ?>.php?id_database=database_program"> <small>DataBase
                                    Laporan&nbsp;
                                </small><span class="badge badge-danger badge-counter"></span>
                            </a></li>

                        <li class="page-item active"><a class="page-link"
                                href="<?= $_SESSION["username"] ?>.php?id_grafik=program"><small
                                    class="text-white">Grafik
                                    Laporan&nbsp;
                                </small><span class="badge badge-danger badge-counter"></span>
                            </a></li>
                    </ul>
                </div>

                <?php if($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Depok"){ ?>
                <!-- Card Body -->
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary ">Grafik Depok Program</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartarea_content_kepala_program_depok"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <!-- Card Body -->
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Depok</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartbar_content_kesehatan_depok"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <!-- Card Body -->
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Depok</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartbar_content_pendidikan_depok"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php } elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Bogor") {?>
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Grafik Bogor Program</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartarea_content_kepala_program_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Bogor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_kesehatan_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Bogor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartbar_content_pendidikan_bogor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <?php } elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {?>
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Depok</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartbar_content_kesehatan_depok"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php } elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Bogor") {?>
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Bogor</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartbar_content_kesehatan_bogor"></canvas>
            </div>
        </div>
    </div>
</div>

<?php } elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Depok") {?>
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Depok</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="chartbar_content_pendidikan_depok"></canvas>
        </div>
    </div>
</div>
</div>

<?php } elseif ($pengurus_id == "kepala_cabang" && $_SESSION['cabang'] == "Bogor") {?>
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary ">Grafik Bogor Program</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="chartarea_content_kepala_program_bogor"></canvas>
        </div>
    </div>
</div>
</div>

<div class="col-xl-6 col-lg-6 mb-4">
    <!-- Card Body -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary ">Program Kesehatan Bogor</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartbar_content_kesehatan_bogor"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-6 mb-4">
    <!-- Card Body -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Bogor</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartbar_content_pendidikan_bogor"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary ">Program Pendidikan Bogor</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="chartbar_content_pendidikan_bogor"></canvas>
        </div>
    </div>
</div>
</div>
<?php } ?>

</div>
<?php } ?>