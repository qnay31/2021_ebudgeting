<?php

// program
$q  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

// notif
$q2  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

$q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=check_logistik"><small
                                class="text-white">RAB&nbsp;
                            </small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_check=logistik_pending"></i><small>Menunggu
                                Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=logistik_laporan"><small>Laporan
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
                    <label for=""><b>Checklist RAB :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Logistik</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Acc Kepala</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);
                                
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status_b']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_logistik&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a>
                                    </td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_anggaran_logistik.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran untuk diproses !!')">Konfirmasi</a>
                                    </td>
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