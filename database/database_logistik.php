<?php
// program
if ($pengurus_id == "logistik" && $_SESSION['cabang'] == "Depok") {
    $q  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Terverifikasi' AND status = 'OK' AND cabang = '$_SESSION[cabang]' AND nama = '$_SESSION[nama]' ORDER BY `tgl_pemakaian` DESC");

    $s = $q->num_rows;
}  else {
    $q  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Terverifikasi' AND status = 'OK' AND cabang = '$_SESSION[cabang]' AND nama = '$_SESSION[nama]' ORDER BY `tgl_pemakaian` DESC");

    $s = $q->num_rows;
}

?>

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
                            href="<?= $_SESSION["username"] ?>.php?id_database=database_logistik"> <small
                                class="text-white">DataBase
                                Logistik&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php if ($pengurus_id == "kepala_logistik") { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_grafik=global_logistik"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                    <?php } else { ?>
                    <?php } ?>
                </ul>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-12 mb-4">
                    <!-- Card Body -->
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan Logistik</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <?php if ($pengurus_id == "kepala_logistik" && $_GET["id_logistik"] == "log_depok") { ?>
                            <?php include '../laporan/logistik_depok.php'; ?>

                            <?php } elseif ($pengurus_id == "kepala_logistik" && $_GET["id_logistik"] == "log_bogor") { ?>
                            <?php include '../laporan/logistik_bogor.php'; ?>

                            <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
                            <?php include '../laporan/logistik_global.php'; ?>
                            <?php } else { ?>
                            <div class="table-responsive">
                                <table id="tabel-data_laporan_verif" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">Logistik</th>
                                            <th scope="col">Cabang</th>
                                            <th scope="col">Periode</th>
                                            <th scope="col">Deskripsi Pemakaian</th>
                                            <th scope="col">Dana Anggaran</th>
                                            <th scope="col">Dana Terpakai</th>
                                            <th scope="col">Dana Cashback</th>
                                            <th scope="col">Bukti Pemakaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                    $convert   = convertDateDBtoIndo($r['tgl_pemakaian']);
                                    $bulan     = substr($convert, 2);

                                    $anggaran = $r['dana_anggaran'];
                                    $terpakai = $r['dana_terpakai'];

                                    $sisa = $anggaran - $terpakai;

                                ?>

                                        <tr>
                                            <td style="text-align: center;"><?= $no++ ?></td>
                                            <td><?= ucwords($r['program']) ?></td>
                                            <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                            <td style="text-align: center;"><?= $bulan ?></td>
                                            <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                            <td>Rp. <?= number_format($anggaran, 0, ".", ".") ?></td>
                                            <td>Rp. <?= number_format($terpakai, 0, ".", ".") ?></td>
                                            <td>Rp. <?= number_format($sisa, 0, ".", ".") ?></td>
                                            <td style="text-align: center;"><input type="button" name="view"
                                                    value="Lihat" data-id="<?= $r['id']  ?>"
                                                    class="btn btn-danger btn-xs view_data_logistik">
                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <th colspan="5">Total Cashback</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>

                                    </tfoot>
                                </table>
                                <!-- Modal -->
                                <div id="dataModal_logistik" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Bukti Kwitansi</h4>
                                            </div>
                                            <div class="modal-body" id="detail_user_logistik">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>