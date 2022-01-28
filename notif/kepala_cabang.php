<?php

// notif rab
// program
$k  = mysqli_query($conn, "SELECT * FROM program WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$i = $k->num_rows;

$n  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a = $n->num_rows;

// baksos
// $n2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

// $a2 = $n2->num_rows;

// logistik
$n3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

$a3 = $n3->num_rows;

// humas
// $n4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

// $a4 = $n4->num_rows;

// notif laporan
// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;

// $q2  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' AND cabang = '$_SESSION[cabang]' ORDER BY `tgl_pengajuan` DESC");

// $s2 = $q2->num_rows;

$q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

$s3 = $q3->num_rows;

// $q4  = mysqli_query($conn, "SELECT * FROM humas WHERE laporan = 'Menunggu Konfirmasi' AND status = 'OK' AND cabang = '$_SESSION[cabang]' ORDER BY `tgl_pengajuan` DESC");

// $s4 = $q4->num_rows;

?>

<!-- Nav Item - RAB -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($a+$a3 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $a+$a3 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            RAB Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=check_cabang">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($a+$a3 == 0){ ?>
                <span class="font-weight-bold">Tidak ada RAB</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $a+$a3 ?> RAB yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_check=check_cabang"><i class="fas fa-search fa-fw"></i>&nbsp;Lihat
            selengkapnya
        </a>
    </div>
</li>

<!-- Nav Item - laporan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($s+$s3 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s+$s3 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Laporan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=cabang_laporan">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s+$s3 == 0){ ?>
                <span class="font-weight-bold">Tidak ada laporan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s+$s3 ?> laporan yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_check=cabang_laporan"><i
                class="fas fa-search fa-fw"></i>&nbsp;Lihat
            selengkapnya
        </a>
    </div>
</li>

<!-- Nav Item - Pengajuan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-edit fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($i == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $i ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="pengajuanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_program">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($i == 0){ ?>
                <span class="font-weight-bold">Tidak ada pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $i ?> Pengajuan siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_program"><i
                class="fas fa-pen fa-fw"></i>&nbsp;Buat laporan
        </a>
    </div>
</li>

<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
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
    </div>
</li>