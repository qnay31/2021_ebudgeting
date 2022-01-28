<?php

// notif pengajuan 
// logistik
if ($pengurus_id == "kepala_logistik" && $_SESSION['cabang'] == "Depok") {
    // pengajuan
    if ($linkid_logistik == 'baksos') {
        $q  = mysqli_query($conn, "SELECT * FROM baksos WHERE id_pengurus = '$pengurus_id' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

        $s = $q->num_rows;

    } elseif ($linkid_logistik == 'maintenance') {
        $q  = mysqli_query($conn, "SELECT * FROM maintenance WHERE id_pengurus = '$pengurus_id' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

        $s = $q->num_rows;
        
    }

    $q2  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Belum Laporan' AND cabang = '$_SESSION[cabang]' AND status_b = 'Pending' ORDER BY `tgl_pengajuan` DESC");

    $s2 = $q2->num_rows;

    $q3  = mysqli_query($conn, "SELECT * FROM logistik WHERE laporan = 'Menunggu Konfirmasi' AND cabang = '$_SESSION[cabang]' AND status = 'OK' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

    $s3 = $q3->num_rows;

} elseif ($pengurus_id == "kepala_cabang" && $_SESSION['cabang'] == "Bogor") {
    $q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;;
} elseif ($posisi == 'Logistik Gedung Management') {
    $q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

    $k  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $a = $k->num_rows;

    $b  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $c = $b->num_rows;

    $f  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $g = $f->num_rows;
}  else {
    $q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' AND status = 'OK' ORDER BY `tgl_pengajuan` DESC");

    $s = $q->num_rows;

    $d  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'OK' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

    $e = $d->num_rows;
}

?>


<?php if ($pengurus_id == "kepala_logistik") { ?>
<?php if ($linkid_logistik == 'baksos') { ?>
<!-- Nav Item - link maintenance -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_link_logistik=maintenance"
        onclick="return confirm('Menuju Link Maintenace?!')">
        <i class="fas fa-tools fa-fw" data-toggle="tooltip" data-placement="left" title="Link Maintenance"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>
<!-- Nav Item - link logistik -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php"
        onclick="return confirm('Menuju Link Logistik?!')">
        <i class="fas fa-network-wired fa-fw" data-toggle="tooltip" data-placement="left"
            title="Link Kepala Logistik"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>

<!-- Nav Item - Pengajuan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-edit fa-fw" data-toggle="tooltip" data-placement="bottom" title="Buat Laporan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_baksos">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white" data-toggle="tooltip" data-placement="bottom"
                        title="Laporan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_baksos"><i
                class="fas fa-pen fa-fw"></i>&nbsp;Buat laporan
        </a>
    </div>
</li>

<?php } elseif ($linkid_logistik == 'maintenance') { ?>
<!-- Nav Item - link baksos -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_link_logistik=baksos"
        onclick="return confirm('Menuju Link Bakti Sosial?!')">
        <i class="fas fa-users fa-fw" data-toggle="tooltip" data-placement="left" title="Link Bakti Sosial"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>

<!-- Nav Item - link logistik -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php"
        onclick="return confirm('Menuju Link Logistik?!')">
        <i class="fas fa-network-wired fa-fw" data-toggle="tooltip" data-placement="left"
            title="Link Kepala Logistik"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>

<!-- Nav Item - Pengajuan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-edit fa-fw" data-toggle="tooltip" data-placement="bottom" title="Buat Laporan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_maintenance">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white" data-toggle="tooltip" data-placement="bottom"
                        title="Laporan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_maintenance"><i
                class="fas fa-pen fa-fw"></i>&nbsp;Buat laporan
        </a>
    </div>
</li>

<?php } else { ?>
<!-- Nav Item - link maintenance -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_link_logistik=maintenance"
        onclick="return confirm('Menuju Link Maintenace?!')">
        <i class="fas fa-tools fa-fw" data-toggle="tooltip" data-placement="left" title="Link Maintenance"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>

<!-- Nav Item - link baksos -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_link_logistik=baksos"
        onclick="return confirm('Menuju Link Bakti Sosial?!')">
        <i class="fas fa-users fa-fw" data-toggle="tooltip" data-placement="left" title="Link Bakti Sosial"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>

<!-- Nav Item - RAB -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw" data-toggle="tooltip" data-placement="bottom" title="Check RAB"></i>
        <!-- Counter - Alerts -->
        <?php if($s2 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            RAB Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=check_logistik">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s2 == 0){ ?>
                <span class="font-weight-bold">Tidak ada pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s2 ?> RAB yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_check=check_logistik"><i
                class="fas fa-search fa-fw"></i>&nbsp;Lihat selengkapnya
        </a>
    </div>
</li>

<!-- Nav Item - laporan -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="bottom"
            title="Check Laporan"></i>
        <!-- Counter - Alerts -->
        <?php if($s3 == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s3 ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Laporan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_check=logistik_laporan">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s3 == 0){ ?>
                <span class="font-weight-bold">Tidak ada pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s3 ?> laporan yang perlu disetujui</span>
                <?php } ?>
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"
            href="<?= $_SESSION["username"] ?>.php?id_check=logistik_laporan"><i
                class="fas fa-search fa-fw"></i>&nbsp;Lihat selengkapnya
        </a>
    </div>
</li>
<?php } ?>

<?php } elseif ($pengurus_id == "kepala_income") { ?>
<?php if ($linkid_cashback == 'cashback') { ?>
<!-- Nav Item - link cashback -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php"
        onclick="return confirm('Menuju Link Income?!')">
        <i class="fas fa-money-check-alt fa-fw" data-toggle="tooltip" data-placement="left" title="Link Income"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>
<?php } else { ?>
<!-- Nav Item - link cashback -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_link_cashback=cashback"
        onclick="return confirm('Menuju Link Cashback?!')">
        <i class="fas fa-money-bill-wave fa-fw" data-toggle="tooltip" data-placement="left" title="Link Cashback"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">!</span>
    </a>
</li>
<?php } ?>

<?php } elseif ($pengurus_id == "logistik" && $posisi == 'Logistik Gedung Management') { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="left" title="Pesan"></i>
        <!-- Counter - Alerts -->
        <?php if($s+$a+$c+$g == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $s+$a+$c+$g ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>

        <?php if ($s+$a+$c+$g > 0) { ?>
        <?php if ($s > 0) { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik">
            <div class="mr-3">
                <div class="icon-circle bg-info">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($s == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $s ?> pengajuan logistik siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($a > 0) { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=gaji">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($a == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $a ?> pengajuan gaji siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($c > 0) { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=aset">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($c == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $c ?> pengajuan aset siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php if ($g > 0) { ?>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=lainnya">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($g == 0){ ?>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $g ?> pengajuan anggaran lainnya siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
        <?php } ?>

        <?php } else { ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
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

<?php } elseif ($pengurus_id == "logistik") { ?>

<?php if ($_SESSION["posisi"] == "Logistik Gedung Taman") { ?>
<?php if ($linkid_taman == "operasional_yayasan") { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php"
        onclick="return confirm('Menuju Link Logistik?!')">
        <i class="fas fa-network-wired fa-fw" data-toggle="tooltip" data-placement="left" title="Link Logistik"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">New</span>
    </a>
</li>

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="left" title="Pesan"></i>
        <!-- Counter - Alerts -->
        <?php if($e == 0){ ?>
        <?php }else { ?>
        <span class="badge badge-danger badge-counter"><?= $e ?></span>
        <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="laporanDropdown">
        <h6 class="dropdown-header">
            Pengajuan Alert !!
        </h6>
        <a class="dropdown-item d-flex align-items-center"
            href="<?= $_SESSION["username"] ?>.php?id_taman=operasional_yayasan&id_input=verifikasi_logistik">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?= convertDateDBtoIndo(date("Y-m-d")) ?></div>
                <?php if($e == 0){ ?>
                <span class="font-weight-bold">Tidak ada Pesan</span>
                <?php }else { ?>
                <span class="font-weight-bold">Ada <?= $e ?> pengajuan siap dilaporkan</span>
                <?php } ?>
            </div>
        </a>
    </div>
</li>
<?php } else { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="<?= $_SESSION["username"] ?>.php?id_taman=operasional_yayasan"
        onclick="return confirm('Menuju Link Operasional Yayasan?!')">
        <i class="fas fa-user-astronaut fa-fw" data-toggle="tooltip" data-placement="left"
            title="Link Operasional Yayasan"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">New</span>
    </a>
</li>

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="left" title="Pesan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik">
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

<?php } else { ?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope-open-text fa-fw" data-toggle="tooltip" data-placement="left" title="Pesan"></i>
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
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik">
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
            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik">
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

<?php if ($pengurus_id == "kepala_cabang") { ?>

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
            href="<?= $_SESSION["username"] ?>.php?id_input=daily_logistik">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="../img/logo/undraw_profile_2.svg" alt="...">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">lihat aktivitas terbaru
                    !!</div>
                <div class="small text-gray-500">Riki Subagja</div>
            </div>
        </a>
    </div>
</li>
<?php }else { ?>
<?php } ?>