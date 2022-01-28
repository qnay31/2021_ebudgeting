<?php
// notif
// logistik
$q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;
// die(var_dump($s2));

// gaji karyawan
$k  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$a = $k->num_rows;


$k2  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$a2 = $k2->num_rows;

// aset yayasan
$as  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$aset = $as->num_rows;
// die(var_dump($aset));

$as2  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$aset2 = $as2->num_rows;

// operasional yayasan
$o  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$op = $o->num_rows;
// die(var_dump($op));

$o2  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$op2 = $o2->num_rows;

// anggaran lainnya
$al  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$aln = $al->num_rows;
// die(var_dump($op));

$al2  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$aln2 = $al2->num_rows;

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <?php if ($linkid_taman == "operasional_yayasan") { ?>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=input_logistik"><small>Pengajuan</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=verifikasi_logistik"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($op == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $op ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=laporan_logistik"><small>Laporan&nbsp;</small>
                            <?php if($op2  == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $op2  ?></span>
                            <?php } ?>
                        </a></li>

                    <?php } else { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=input_logistik">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s+$a+$aset+$aln == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s+$a+$aset+$aln ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik"><small>Laporan&nbsp;</small>
                            <?php if($s2+$a2+$aset2+$op2+$aln2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$aset2+$aln2 ?></span>
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
                    <!-- gaji -->
                    <?php if ($_GET["id_management"] == "gaji") { ?>
                    <?php include '../data_management/verifikasi/gaji_karyawan.php'; ?>

                    <!-- asset -->
                    <?php } elseif ($_GET["id_management"] == "aset") { ?>
                    <?php include '../data_management/verifikasi/aset.php'; ?>

                    <!-- anggaran lainnya -->
                    <?php } elseif ($_GET["id_management"] == "lainnya") { ?>
                    <?php include '../data_management/verifikasi/lainnya.php'; ?>

                    <!-- logistik -->
                    <?php } else { ?>
                    <?php include '../data_management/verifikasi/logistik.php'; ?>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>



</div>