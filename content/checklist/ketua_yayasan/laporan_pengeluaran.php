<?php

$key    = $_GET["id_laporan"];

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

    $query = mysqli_query($conn, "SELECT * FROM aset_yayasan");
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

                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_verifikasi=<?= $key ?>"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_laporan=<?= $key ?>"></i><small
                                class="text-white">Laporan&nbsp;</small>
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

                        <!-- program -->
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
                        <table id="tabel-data_cek_lap" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
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
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q3->fetch_assoc()) {
                                $bln       = substr($r['tgl_laporan'], 5,-3);
                                $anggaran = $r['gaji_karyawan'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?> <?= $r["cabang"] ?> </td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                                    <td><?= ucwords($r['pemakaian']) ?> <?= $r["cabang"] ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_gaji.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['laporan']) ?></td>
                                </tr>

                                <?php } ?>
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

                        <?php } elseif ($key == 'check_aset') { ?>
                        <table id="tabel-data_lap_aset" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Qty Perencanaan</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
                                    <th scope="col">Qty Pembelian</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Terpakai</th>
                                    <th scope="col">Cashback</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q3->fetch_assoc()) {
                                $bln       = substr($r['tgl_laporan'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['qty_anggaran']) ?> Pcs</td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                                    <td><?= ucwords($r['pemakaian']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['qty_pembelian']) ?> Pcs</td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_aset.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-dark btn-xs view_data_aset">
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total Cashback</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_aset" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_aset">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } elseif ($key == 'check_produksi') { ?>
                        <table id="tabel-data_lap_produksi" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Untuk Rencana</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
                                    <th scope="col">Terpakai</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Cashback</th>
                                    <th scope="col">Resi</th>
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
                                    <td style="text-align: center;"><?= ucwords($r['produksi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_laporan_produksi.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                    </td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_produksi">
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="5">Total Anggaran</th>
                                    <th></th>
                                    <th colspan="2">Total Pemakaian</th>
                                    <th></th>
                                    <th colspan="1">Total Cashback</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_produksi" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_produksi">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } else { ?>
                        <table id="tabel-data_cek_lap" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q3->fetch_assoc()) {
                                $bln       = substr($r['tgl_laporan'], 5,-3);
                                $bln2       = substr($r['tgl_pemakaian'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                                        <?php if ($r['kategori'] == 'Maintenance') { ?>
                                        <?= $r['maintenance'] ?>
                                        <?php } ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <?php if ($r['kategori'] == 'Maintenance') { ?>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <?php } else { ?>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                                    <td><?= ucwords($r['pemakaian']) ?></td>
                                    <?php } ?>
                                    <td style=" text-align: center;">
                                        <?php if ($key == 'check_operasional') { ?>
                                        <a class="btn btn-success"
                                            href="../admin/verif_laporan_operasional.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                        <?php } elseif ($key == 'check_maintenance') { ?>
                                        <a class="btn btn-success"
                                            href="../admin/verif_laporan_maintenance.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln2 ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                        <?php } else { ?>
                                        <a class="btn btn-success"
                                            href="../admin/verif_laporan_lainnya.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan sudah valid?!')">Konfirmasi</a>
                                        <?php } ?>
                                    </td>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['laporan']) ?></td>
                                    <?php if ($key == 'check_operasional') { ?>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>"
                                            class="btn btn-dark btn-xs view_data_operasional">
                                    </td>
                                    <?php } elseif ($key == 'check_maintenance') { ?>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>"
                                            class="btn btn-dark btn-xs view_data_maintenance">
                                    </td>
                                    <?php } else { ?>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-dark btn-xs view_data_lain">
                                    </td>
                                    <?php } ?>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="9">Total Cashback</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <?php if ($key == 'check_operasional') { ?>
                        <!-- Modal -->
                        <div id="dataModal_operasional" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_operasional">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } elseif ($key == 'check_maintenance') { ?>
                        <!-- Modal -->
                        <div id="dataModal_maintenance" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_maintenance">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } else { ?>
                        <!-- Modal -->
                        <div id="dataModal_lain" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_lain">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>