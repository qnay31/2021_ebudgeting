<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DataBase 2021</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item">
                        <a class="page-link" href="<?= $_SESSION["username"] ?>.php?id_laporan=laporan_2021">
                            <small>Data Tahunan&nbsp;</small>
                        </a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021">
                            <small class="text-white">Data Bulanan&nbsp;</small>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Laporan Bulanan Yayasan Alkirom Amanah</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- income media sosial -->
                    <?php if ($_GET["id_bulanan"] == "") { ?>
                    <div class="row card-bot">
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=income">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Income Media Sosial
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=pemasukan">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Income Humas
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=program">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Program Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=baksos">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Bakti Sosial
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=logistik">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Logistik Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=gaji_karyawan">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Gaji Karyawan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=aset_yayasan">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Aset Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a
                                href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=operasional_yayasan">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Operasional Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=anggaran_lain">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Biaya Lainnya Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=produksi">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Produksi Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=maintenance">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body text-center">
                                        Maintenance Yayasan
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php } else { ?>
                    <?php include 'detail_bulanan_2021.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>