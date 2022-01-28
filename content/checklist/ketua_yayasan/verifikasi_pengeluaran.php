<?php

$key    = $_GET["id_verifikasi"];

if ($key == 'check_gaji') {
    $q  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE status = 'Pending' ORDER BY `tgl_dibuat` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM gaji_karyawan");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
    
} elseif ($key == 'check_aset') {
    $q  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE status = 'Pending' ORDER BY `tgl_dibuat` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM aset_yayasan ");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];

} elseif ($key == 'check_operasional') {
    $q  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE status = 'Pending' ORDER BY `tgl_dibuat` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM operasional_yayasan ");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];

} elseif ($key == 'check_produksi') {
    $q  = mysqli_query($conn, "SELECT * FROM produksi WHERE status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM produksi WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM produksi WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_pengajuan` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM produksi");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["produksi"];

} elseif ($key == 'check_maintenance') {
    $q  = mysqli_query($conn, "SELECT * FROM maintenance WHERE status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM maintenance WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM maintenance WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_pengajuan` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM maintenance");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
    
} else {
    $q  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE status = 'Pending' ORDER BY `tgl_dibuat` DESC");

    $s = $q->num_rows;

    $q2  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

    $s3 = $q3->num_rows;

    $query = mysqli_query($conn, "SELECT * FROM anggaran_lain ");
    $data   = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
}


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=<?= $key ?>"></i><small>Pengeluaran&nbsp;</small>

                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_verifikasi=<?= $key ?>"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_laporan=<?= $key ?>"></i><small>Laporan&nbsp;</small>
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
                    <label for=""><b>Menunggu Laporan :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">

                        <!-- kategori -->
                        <div class="text-center">
                            <label for="">
                                <b style="color: black;">
                                    <?php if ($key == 'check_produksi') { ?>
                                    Produksi
                                    <?php } else { ?>
                                    <?= $kategori ?>
                                    <?php } ?>
                                </b>
                                <hr>
                            </label>
                        </div>
                        <?php if ($key == 'check_gaji') { ?>
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
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
                                    <td><?= ucwords($r['kategori']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?> <?= $r['cabang'] ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['laporan']) ?></b></td>
                                    <td>Rp. <?= number_format($r['gaji_karyawan'],0,"." , ".") ?></td>
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

                        <?php } elseif ($key == 'check_aset') { ?>
                        <table id="tabel-data_aset" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_dibuat'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['kategori']) ?></td>
                                    <td><?= ucwords($r['jenis']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['qty_anggaran']) ?> Pcs</td>
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
                                    <th colspan="9">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <?php } elseif ($key == 'check_produksi') { ?>
                        <table id="tabel-data_produksi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Produksi</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['produksi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['jenis']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style=" text-align: center;"><?= ucwords($r['laporan']) ?>
                                    </td>
                                    <td>Rp. <?= number_format($r['dana_anggaran'],0,"." , ".") ?></td>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <?php } elseif ($key == 'check_maintenance') { ?>
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Laporan</th>
                                    <th scope="col">Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                                        <?= ucwords($r['maintenance']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['laporan']) ?></td>
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

                        <?php } else { ?>
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
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
                                    <td><?= ucwords($r['kategori']) ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
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
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>