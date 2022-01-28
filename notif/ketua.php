<?php

// notif rab
// program
$n  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a = $n->num_rows;

// baksos
$n2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a2 = $n2->num_rows;

// logistik
$n3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a3 = $n3->num_rows;

// humas
$n4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND status_b = 'OK' AND status = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a4 = $n4->num_rows;

// notif laporan
// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

$q2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

$q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;

$q4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Menunggu Verifikasi' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s4 = $q4->num_rows;

// notif pemasukan

$k  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = 'celengan' AND status = 'Pending' ORDER BY `tgl_ambil` DESC");

$l = $k->num_rows;

$k2  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = 'kotak amal' AND status = 'Pending' ORDER BY `tgl_ambil` DESC");

$l2 = $k2->num_rows;

// die(var_dump($l2));

// income media sosial
$k3  = mysqli_query($conn, "SELECT * FROM income WHERE status = 'Menunggu Verifikasi' ORDER BY `tgl_pemasukan` DESC");

$l3 = $k3->num_rows;

// gaji karyawan
$k4  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$l4 = $k4->num_rows;

$k5  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$l5 = $k5->num_rows;

// aset yayasan
$k6  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$l6 = $k6->num_rows;

$k7  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$l7 = $k7->num_rows;

// operasional yayasan
$k8  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$l8 = $k8->num_rows;

$k9  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$l9 = $k9->num_rows;

// anggaran lainnya
$k10  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$l10 = $k10->num_rows;

$k11  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$l11 = $k11->num_rows;

// produksi
$k12  = mysqli_query($conn, "SELECT * FROM produksi WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_pengajuan` DESC");

$l12 = $k12->num_rows;

$k13  = mysqli_query($conn, "SELECT * FROM produksi WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$l13 = $k13->num_rows;

// maintenance
$k14  = mysqli_query($conn, "SELECT * FROM maintenance WHERE status = 'OK' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_pengajuan` DESC");

$l14 = $k14->num_rows;

$k15  = mysqli_query($conn, "SELECT * FROM maintenance WHERE status = 'Pending' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$l15 = $k15->num_rows;

// cashback
$k16  = mysqli_query($conn, "SELECT * FROM cashback WHERE status = 'Menunggu Verifikasi' ORDER BY `tgl_cashback` DESC");

$l16 = $k16->num_rows;


?>

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="incomeDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-link fa-fw" data-toggle="tooltip" data-placement="left" title="New Fitur !!"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="incomeDropdown">
        <h6 class="dropdown-header">
            New Fitur !!
        </h6>
        <a class="dropdown-item d-flex align-items-center" href="../../admin_dompet/">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-link text-white"></i>
                </div>
            </div>
            <div>
                <span class="font-weight-bold">Fitur ini merupakan redirect menuju halaman admin dari
                    dompetdonasi.com</span>
            </div>
        </a>
    </div>
</li>

<!-- Nav Item - Pemasukan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="incomeDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-money-check-alt fa-fw" data-toggle="tooltip" data-placement="bottom" title="Pemasukan"></i>
        <!-- Counter - Alerts -->
        <?php if($l+$l2+$l3 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $l+$l2+$l3 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="incomeDropdown">
        <h6 class="dropdown-header">
            Income Alert !!
        </h6>
        <?php if($l3 == 0){ ?>
        <?php }else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_income">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l+$l2+$l3 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $l3 ?> Pemasukan Harian yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if($l == 0){ ?>
        <?php }else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_celengan">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l+$l2+$l3 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $l ?> Pemasukan Celengan yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if($l2 == 0){ ?>
        <?php }else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_kotak">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l+$l2+$l3 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $l2 ?> Pemasukan Kotak Amal yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if($l+$l2+$l3 == 0){ ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <span class="font-weight-bold">Tidak ada Pesan</span>
            </div>
        </a>
        <?php } ?>
    </div>
</li>

<!-- Nav Item - RAB -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw" data-toggle="tooltip" data-placement="bottom" title="RAB"></i>
        <!-- Counter - Alerts -->
        <?php if($a+$a2+$a3+$a4+$l5+$l7+$l9+$l11+$l13+$l15 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $a+$a2+$a3+$a4+$l5+$l7+$l9+$l11+$l13+$l15 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            RAB Alert !!
        </h6>

        <?php if ($a+$a2+$a3+$a4+$l5+$l7+$l9+$l11+$l13+$l15 > 0) { ?>
        <?php if ($a+$a2+$a3+$a4 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=check_global">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($a+$a2+$a3+$a4 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $a+$a2+$a3+$a4 ?> RAB yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l5 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_gaji">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l5 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l5 ?> Pengajuan gaji telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l7 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_aset">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l7 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l7 ?> Pengajuan Aset Yayasan telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l9 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_operasional">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l9 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l9 ?> Pengajuan Operasional Yayasan telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l11 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_lainnya">
            <div class="mr-3">
                <div class="icon-circle bg-secondary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l11 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l11 ?> Pengajuan Anggaran Lainnya telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l13 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_produksi">
            <div class="mr-3">
                <div class="icon-circle bg-dark">
                    <i class="fas fa-building text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l13 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l13 ?> Pengajuan Produksi telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l15 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pengeluaran=check_maintenance">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-tools text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l15 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l15 ?> Pengajuan Maintenance telah diajukan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <span class="font-weight-bold">Tidak ada Pesan</span>
            </div>
        </a>
        <?php } ?>
    </div>
</li>

<!-- Nav Item - laporan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="bottom" title="Laporan"></i>
        <!-- Counter - Alerts -->
        <?php if($s+$s2+$s3+$s4+$l4+$l6+$l8+$l10+$l12+$l14+$l16 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s+$s2+$s3+$s4+$l4+$l6+$l8+$l10+$l12+$l14+$l16 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Laporan Alert !!
        </h6>
        <?php if ($s+$s2+$s3+$s4+$l4+$l6+$l8+$l10+$l12+$l14+$l16 > 0) { ?>
        <?php if ($s+$s2+$s3+$s4 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=global_laporan">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s+$s2+$s3+$s4 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s+$s2+$s3+$s4 ?> laporan perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l4 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_gaji">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l4 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l4 ?> laporan gaji telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l6 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_aset">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l6 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l6 ?> laporan aset yayasan telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l8 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_operasional">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l8 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l8 ?> laporan operasional yayasan telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l10 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_lainnya">
            <div class="mr-3">
                <div class="icon-circle bg-secondary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l10 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l10 ?> laporan lainnya telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l12 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_produksi">
            <div class="mr-3">
                <div class="icon-circle bg-dark">
                    <i class="fas fa-building text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l12 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l12 ?> laporan Produksi telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l14 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_laporan=check_maintenance">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-tools text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l14 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l14 ?> laporan Maintenance telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($l16 == 0) { ?>
        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_cashback">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-money-bill-wave text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($l16 == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold"><?= $l16 ?> laporan Cashback telah dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <span class="font-weight-bold">Tidak ada Pesan</span>
            </div>
        </a>
        <?php } ?>
    </div>
</li>

<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw" data-toggle="tooltip" data-placement="bottom" title="pesan"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
            Notification
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=daily_program">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="../img/logo/undraw_profile_2.svg" alt="...">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">lihat aktivitas terbaru <b>Program</b>
                    !!</div>
                <div class="small text-gray-500">Riki Subagja</div>
            </div>
        </a>

        <a class="dropdown-item d-flex align-items-center" href="<?= $_SESSION["username"] ?>.php?id_input=daily_humas">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="../img/logo/undraw_profile_2.svg" alt="...">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">lihat aktivitas terbaru <b>Humas</b>
                    !!</div>
                <div class="small text-gray-500">Riki Subagja</div>
            </div>
        </a>
    </div>
</li>