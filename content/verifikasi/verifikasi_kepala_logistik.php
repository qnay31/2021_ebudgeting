<?php
// notif

if ($pengurus_id == 'kepala_produksi') {
    $q  = mysqli_query($conn, "SELECT * FROM produksi WHERE id_pengurus = '$pengurus_id' AND `nama` =
'$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2 = mysqli_query($conn, "SELECT * FROM produksi WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status
= 'OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan`
DESC");

$s2 = $q2->num_rows;
} else {
    $q  = mysqli_query($conn, "SELECT * FROM $linkid_logistik WHERE id_pengurus = '$pengurus_id' AND `nama` =
    '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");
    
    $s = $q->num_rows;
    
    
    $q2 = mysqli_query($conn, "SELECT * FROM $linkid_logistik WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status
    = 'OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan`
    DESC");
    
    $s2 = $q2->num_rows;
}

// die(var_dump($s2));

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <?php if ($pengurus_id == "kepala_produksi") { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=input_produksi">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=verifikasi_produksi"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_produksi"><small>Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=input_<?= $linkid_logistik ?>">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_<?= $linkid_logistik ?>"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=laporan_<?= $linkid_logistik ?>"><small>Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Verifikasi Pengajuan:</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
                        <?php if ($pengurus_id == "kepala_produksi") { ?>
                        <div class="text-center">
                            <label for=""><b style="color: black;">Tabel Produksi 2021</b>
                                <hr>
                            </label>
                        </div>
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
                                    <th scope="col">Menu</th>
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
                                    <td style="text-align: center;"><?= ucwords($r['produksi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['jenis']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <?php if($r['status'] == "OK"){ ?>
                                    <td style=" text-align: center;">
                                        <a class="btn btn-success"
                                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_produksi&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Semua tugas selesai, siap laporkan !!')">Laporan</a>
                                    </td>
                                    <?php } elseif ($r['status_b'] == "OK") { ?>
                                    <td style=" text-align: center;" class="disabled">
                                        <a class="btn btn-success disable" href="">Laporan</a>
                                    </td>
                                    <?php } else { ?>
                                    <td style=" text-align: center;">
                                        <a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_produksi&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a> || <a
                                            class="btn btn-danger"
                                            href="../content/hapus/hapus_produksi.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau dihapus?!')">Hapus</a>
                                    </td>
                                    <?php } ?>
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
                        <?php } elseif ($linkid_logistik == 'maintenance') { ?>
                        <div class="text-center">
                            <label for=""><b style="color: black;">Tabel Maintenance 2021</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_produksi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Katagori</th>
                                    <th scope="col">Maintenance</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Menu</th>
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
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['maintenance']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['perencanaan']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <?php if($r['status'] == "OK"){ ?>
                                    <td style=" text-align: center;">
                                        <a class="btn btn-success"
                                            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=laporan_<?= $linkid_logistik ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Semua tugas selesai, siap laporkan !!')">Laporan</a>
                                    </td>
                                    <?php } elseif ($r['status_b'] == "OK") { ?>
                                    <td style=" text-align: center;" class="disabled">
                                        <a class="btn btn-success disable" href="">Laporan</a>
                                    </td>
                                    <?php } else { ?>
                                    <td style=" text-align: center;">
                                        <a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_edit=edit_<?= $linkid_logistik ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a> || <a
                                            class="btn btn-danger"
                                            href="../content/hapus/hapus_<?= $linkid_logistik ?>.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau dihapus?!')">Hapus</a>
                                    </td>
                                    <?php } ?>
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

                        <?php } else { ?>
                        <div class="text-center">
                            <label for=""><b style="color: black;">Tabel Bakti Sosial 2021</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
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
                                    <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <?php if($r['status'] == "OK"){ ?>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=laporan_<?= $linkid_logistik ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Semua tugas selesai, siap laporkan !!')">Laporan</a>
                                    </td>
                                    <?php } elseif($r['status'] == "Pending"){ ?>
                                    <td style=" text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_edit=edit_<?= $linkid_logistik ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a>
                                    </td>
                                    <?php }else { ?>
                                    <td style=" text-align: center;" class="disabled"><a class="btn btn-success disable"
                                            href="#">Laporan</a>
                                    </td>
                                    <?php } ?>

                                    <?php if($r['status'] == "Pending"){ ?>
                                    <td style=" text-align: center;"><a class="btn btn-danger"
                                            href="../content/hapus/hapus_<?= $linkid_logistik ?>.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Data akan dihapus, sudah yakin?')">Hapus</a>
                                    </td>
                                    <?php }else { ?>
                                    <td style=" text-align: center;" class="disabled">-
                                    </td>
                                    <?php } ?>
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>