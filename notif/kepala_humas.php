<?php

// notif pengajuan 
// humas
if ($pengurus_id == "kepala_humas" && $_SESSION['cabang'] == "Depok") {
    // pengajuan
    $q  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$pengurus_id' AND `cabang` = '$_SESSION[cabang]' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "kepala_produksi") {
    $q  = mysqli_query($conn, "SELECT * FROM produksi WHERE id_pengurus = '$pengurus_id' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "kepala_cabang" && $_SESSION['cabang'] == "Bogor") {
    $q  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;;
}  else {
    $q  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;
}

?>


<?php if ($pengurus_id == "kepala_humas") { ?>

<!-- Nav Item - Pengajuan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-edit fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($s == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="pengajuanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_humas">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s == 0){ ?>
                <span class="font-weight-bold">Tidak ada pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s ?> Pengajuan siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_humas"><i class="fas fa-pen fa-fw"></i>&nbsp;Buat
            laporan
        </a>
    </div>
</li>
<?php } elseif ($pengurus_id == "kepala_produksi") { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="left" title="Laporan"></i>
        <!-- Counter - Alerts -->
        <?php if($s == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_produksi">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s == 0){ ?>
                <span class="font-weight-bold">Tidak ada Pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s ?> pengajuan produksi siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
    </div>
</li>

<?php } elseif ($pengurus_id == "humas") { ?>
<?php }else { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($s == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_humas">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s == 0){ ?>
                <span class="font-weight-bold">Tidak ada Pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s ?> pengajuan siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
    </div>
</li>
<?php } ?>

<?php if ($pengurus_id == "kepala_produksi") { ?>
<?php } else { ?>
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
        <a class="dropdown-item d-flex align-items-center" href="<?= $_SESSION["username"] ?>.php?id_input=daily_humas">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="../img/logo/undraw_profile_2.svg" alt="...">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">Laporkan aktivitas hari ini
                    !!</div>
                <div class="small text-gray-500">Riki Subagja</div>
            </div>
        </a>
    </div>
</li>
<?php } ?>