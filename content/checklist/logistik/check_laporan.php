<?php

// logistik
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
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=check_logistik"><small>RAB&nbsp;
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

                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=logistik_laporan"><small
                                class="text-white">Laporan
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
                    <label for=""><b>Checklist Laporan :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
                        <table id="tabel-data_cek_lap" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Logistik</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Terpakai</th>
                                    <th scope="col">Cashback</th>
                                    <th scope="col">Bukti Pemakaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q3->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);

                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                
                                $sisa = $anggaran - $terpakai;

                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td style=" text-align: center;">
                                        <a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_logistik&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan ini mau diedit?!')">Edit</a> ||
                                        <a class="btn btn-secondary"
                                            href="../content/hapus/hapus_laporan_logistik.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan <?= ucwords($r['program']) ?> Mau Dihapus?!')">Hapus</a>
                                    </td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_logistik.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_logistik">
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total</th>
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
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>