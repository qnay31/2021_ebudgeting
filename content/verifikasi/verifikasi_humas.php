<?php
// notif

$q  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status = 'OK' AND status_b ='OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;
// die(var_dump($s2));

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=input_humas">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=verifikasi_humas"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_humas"><small>Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Verifikasi Pengajuan:</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Perlengkapan</th>
                                    <th scope="col">Diajukan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rencana</th>
                                    <th scope="col">Status Admin</th>
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
                                    <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <?php if($r['status'] == "OK"){ ?>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_humas&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Semua tugas selesai, siap laporkan !!')">Laporan</a>
                                    </td>
                                    <?php } elseif($r['status'] == "Pending"){ ?>
                                    <td style=" text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_humas&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a>
                                    </td>
                                    <?php }else { ?>
                                    <td style=" text-align: center;" class="disabled"><a class="btn btn-success disable"
                                            href="#">Laporan</a>
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
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>