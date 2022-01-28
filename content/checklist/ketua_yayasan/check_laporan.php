<?php

// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

$q2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

$q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;

$q4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s4 = $q4->num_rows;

// notif
// program
$n  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a = $n->num_rows;

// baksos
$n2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a2 = $n2->num_rows;

// logistik
$n3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a3 = $n3->num_rows;

// humas
$n4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$a4 = $n4->num_rows;

// notif rab
// program
$n5  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a5 = $n5->num_rows;

// baksos
$n6  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a6 = $n6->num_rows;

// logistik
$n7  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a7 = $n7->num_rows;

// humas
$n8  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

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
                            <?php if($a5+$a6+$a7+$a8 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $a5+$a6+$a7+$a8 ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_check=global_pending"></i><small>Belum
                                Laporan&nbsp;</small>
                            <?php if($a+$a2+$a3+$a4 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $a+$a2+$a3+$a4 ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_check=global_laporan"><small
                                class="text-white">Laporan
                                &nbsp;</small>
                            <?php if($s+$s2+$s3+$s4 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s+$s2+$s3+$s4 ?></span>
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

                        <!-- program -->
                        <div class="text-center">
                            <label for=""><b style="color: black;">LAPORAN PROGRAM</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_cek_lap" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
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
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_pemakaian'], 5,-3);

                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                
                                $sisa = $anggaran - $terpakai;

                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_program_pusat.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_program">
                                    </td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total Cashback</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_program" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_program">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- bakti sosial -->
                        <div class="text-center">
                            <label for=""><b style="color: black;">LAPORAN BAKTI SOSIAL</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_cek_lap2" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
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
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_pemakaian'], 5,-3);

                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                
                                $sisa = $anggaran - $terpakai;

                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_baksos_pusat.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_baksos">
                                    </td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total Cashback</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_baksos" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_baksos">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- logistik -->
                        <div class="text-center mt-5">
                            <label for=""><b style="color: black;">LAPORAN LOGISTIK</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_cek_lap3" class="table table-striped table-bordered nowrap">
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
                                $bln       = substr($r['tgl_pemakaian'], 5,-3);

                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                
                                $sisa = $anggaran - $terpakai;

                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_logistik_pusat.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_logistik">
                                    </td>
                                </tr>

                                <?php     
                                }
                                ?>
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

                        <!-- Humas -->
                        <div class="text-center mt-5">
                            <label for=""><b style="color: black;">LAPORAN HUMAS</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_cek_lap4" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Perlengkapan</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
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
                                while ($r = $q4->fetch_assoc()) {
                                $bln       = substr($r['tgl_pemakaian'], 5,-3);

                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                
                                $sisa = $anggaran - $terpakai;

                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_humas_pusat.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_humas">
                                    </td>
                                </tr>

                                <?php     
                                }
                                ?>
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
                        <div id="dataModal_humas" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_humas">
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