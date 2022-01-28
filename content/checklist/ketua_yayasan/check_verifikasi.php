<?php

// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

// baksos
$q2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

// logistik
$q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;

// humas
$q4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s4 = $q4->num_rows;

// notif
// program
$n  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a = $n->num_rows;

// baksos
$n2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a2 = $n2->num_rows;

// logistik
$n3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a3 = $n3->num_rows;

// humas
$n4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a4 = $n4->num_rows;

$n5  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a5 = $n5->num_rows;

$n6  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a6 = $n6->num_rows;

$n7  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a7 = $n7->num_rows;

$n8  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a8 = $n8->num_rows;


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=check_global"> <small>RAB&nbsp;
                            </small>
                            <?php if($a+$a2+$a3+$a4 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $a+$a2+$a3+$a4 ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_check=global_pending"></i><small
                                class="text-white">Belum
                                Laporan&nbsp;</small>

                            <?php if($s+$s2+$s3+$s4 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s+$s2+$s3+$s4 ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=global_laporan"><small>Laporan
                                &nbsp;</small>
                            <?php if($a5+$a6+$a7+$a8 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $a5+$a6+$a7+$a8 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Menunggu Laporan :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">

                        <!-- program -->
                        <div class="text-center">
                            <label for=""><b style="color: black;">RAB PROGRAM</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Acc Kepala</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status_b']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['laporan']) ?></b></td>
                                    <td>Rp. <?= number_format($r['dana_anggaran'],0,"." , ".") ?></td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="8">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- bakti sosial -->
                        <div class="text-center mt-5">
                            <label for=""><b style="color: black;">RAB BAKTI SOSIAL</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_verifikasi2" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status_b']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['laporan']) ?></b></td>
                                    <td>Rp. <?= number_format($r['dana_anggaran'],0,"." , ".") ?></td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="8">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- logistik -->
                        <div class="text-center mt-5">
                            <label for=""><b style="color: black;">RAB LOGISTIK</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_verifikasi3" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Logistik</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Acc Kepala</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q3->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status_b']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['laporan']) ?></b></td>
                                    <td>Rp. <?= number_format($r['dana_anggaran'],0,"." , ".") ?></td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="8">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Humas -->
                        <div class="text-center mt-5">
                            <label for=""><b style="color: black;">RAB HUMAS</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_verifikasi4" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Acc Kepala</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q4->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status_b']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['laporan']) ?></b></td>
                                    <td>Rp. <?= number_format($r['dana_anggaran'],0,"." , ".") ?></td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="8">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>