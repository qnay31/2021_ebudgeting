<?php

// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

// notif
$q2  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

$q3  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=check_program"><small>RAB&nbsp;
                            </small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_check=lap_pending"></i><small
                                class="text-white">Menunggu
                                Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=verif_laporan"><small>Laporan
                                &nbsp;</small>
                            <?php if($s3 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s3 ?></span>
                            <?php } ?>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>List Belum Laporan :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
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

                                <?php } ?>
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