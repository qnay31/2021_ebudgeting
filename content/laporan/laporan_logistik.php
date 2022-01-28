<?php

// require 'function.php';

if (isset($_POST["input_logistik"]) ) {
    $link = $_SESSION["username"];
    if(laporan_logistik($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil diproses');
                document.location.href = '$link.php?id_input=laporan_logistik';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input_gaji"]) ) {
    $link = $_SESSION["username"];
    if(laporan_gaji($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil diproses');
                document.location.href = '$link.php?id_input=laporan_logistik&id_management=gaji';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input_aset"]) ) {
    $link = $_SESSION["username"];
    if(laporan_aset($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil diproses');
                document.location.href = '$link.php?id_input=laporan_logistik&id_management=aset';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input_operasional"]) ) {
    $link = $_SESSION["username"];
    if(laporan_operasional($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil diproses');
                document.location.href = '$link.php?id_taman=$linkid_taman&id_input=laporan_logistik';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input_lainnya"]) ) {
    $link = $_SESSION["username"];
    if(laporan_lainnya($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil diproses');
                document.location.href = '$link.php?id_input=laporan_logistik&id_management=lainnya';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

// notif
$q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

$id     = $_GET["id_unik"];
$unik   = $_GET["id_p"];

$query  = mysqli_query($conn, "SELECT * FROM logistik WHERE id = '$id' AND MONTH(tgl_pengajuan) = '$unik' ");

$data               = mysqli_fetch_assoc($query);
$id_unik            = $data["id"];
$nama               = $data["nama"];
$laporan            = $data["laporan"];
$program            = $data["program"];
$tanggal_1          = $data["tgl_pengajuan"];
$deskripsi          = $data["deskripsi"];
$anggaran           = $data["dana_anggaran"];
$status_laporan     = $data["id"];
$status_a           = $data["status"];

// gaji karyawan
$k  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$a = $k->num_rows;

$k2  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$a2 = $k2->num_rows;

$id2     = $_GET["id_unik2"];
$unik2   = $_GET["id_p2"];

$query2  = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id = '$id2' AND MONTH(tgl_dibuat) = '$unik2' ");

$data2               = mysqli_fetch_assoc($query2);
$id_unik2            = $data2["id"];
$nama2               = $data2["nama"];
$laporan2            = $data2["laporan"];
$program2            = $data2["kategori"];
$tanggal_12          = $data2["tgl_dibuat"];
$deskripsi2          = $data2["deskripsi"];
$anggaran2           = $data2["gaji_karyawan"];
$status_laporan2     = $data2["id"];
$status_a2           = $data2["status"];
// die(var_dump($status_a2));

// aset yayasan
$b  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$c = $b->num_rows;

$b2  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$c2 = $b2->num_rows;

$id3     = $_GET["id_unik3"];
$unik3   = $_GET["id_p3"];

$query3  = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id = '$id3' AND MONTH(tgl_dibuat) = '$unik3' ");
$data3               = mysqli_fetch_assoc($query3);
$id_unik3            = $data3["id"];
$nama3               = $data3["nama"];
$laporan3            = $data3["laporan"];
$program3            = $data3["kategori"];
$tanggal_13          = $data3["tgl_dibuat"];
$deskripsi3          = $data3["deskripsi"];
$qty                 = $data3["qty_anggaran"];
$anggaran3           = $data3["dana_anggaran"];
$status_laporan3     = $data3["id"];
$status_a3           = $data3["status"];
// die(var_dump($c));

// operasional yayasan
$d  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$e = $d->num_rows;

$d2  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$e2 = $d2->num_rows;

$o2  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$op2 = $o2->num_rows;

$id4     = $_GET["id_unik4"];
$unik4   = $_GET["id_p4"];

$query4  = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id = '$id4' AND MONTH(tgl_dibuat) = '$unik4' ");
$data4               = mysqli_fetch_assoc($query4);
$id_unik4            = $data4["id"];
$nama4               = $data4["nama"];
$laporan4            = $data4["laporan"];
$program4            = $data4["kategori"];
$tanggal_14          = $data4["tgl_dibuat"];
$deskripsi4          = $data4["deskripsi"];
$anggaran4           = $data4["dana_anggaran"];
$status_laporan4     = $data4["id"];
$status_a4           = $data4["status"];
// die(var_dump($c));

// anggaran lainnya
$f  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_dibuat` DESC");

$g = $f->num_rows;

$f2  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Verifikasi' ORDER BY `tgl_dibuat` DESC");

$g2 = $f2->num_rows;

$id5     = $_GET["id_unik5"];
$unik5   = $_GET["id_p5"];

$query5  = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id = '$id5' AND MONTH(tgl_dibuat) = '$unik5' ");
$data5               = mysqli_fetch_assoc($query5);
$id_unik5            = $data5["id"];
$nama5               = $data5["nama"];
$laporan5            = $data5["laporan"];
$program5            = $data5["kategori"];
$tanggal_15          = $data5["tgl_dibuat"];
$deskripsi5          = $data5["deskripsi"];
$anggaran5           = $data5["dana_anggaran"];
$status_laporan5     = $data5["id"];
$status_a5           = $data5["status"];

// die(var_dump($s2+$a2+$c2+$g2));


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
                            href="../user/<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=input_logistik">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=verifikasi_logistik"></i><small>Verifikasi&nbsp;</small>
                            <?php if($e == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $e ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=input_logistik">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s+$a+$c+$g == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s+$a+$c+$g ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } ?>


                    <?php if(($id_unik == $id ) && $status_a == "OK" ){ ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_unik=<?= $id ?>&id_p=<?= $unik ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$e2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$e2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } elseif ($id_unik2 == $id2 && $status_a2 == 'OK') { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=gaji&id_unik2=<?= $id2 ?>&id_p2=<?= $unik2 ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$e2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$e2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } elseif ($id_unik3 == $id3 && $status_a3 == 'OK') { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=aset&id_unik3=<?= $id3 ?>&id_p3=<?= $unik3 ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$e2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$e2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>

                    <?php } elseif ($id_unik4 == $id4 && $status_a4 == 'OK') { ?>
                    <?php if ($linkid_taman == "operasional_yayasan") { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=laporan_logistik&id_unik4=<?= $id4 ?>&id_p4=<?= $unik4 ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($e2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $e2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_unik4=<?= $id4 ?>&id_p4=<?= $unik4 ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>


                    <?php } elseif ($id_unik5 == $id5 && $status_a5 == 'OK') { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=lainnya&id_unik5=<?= $id5 ?>&id_p5=<?= $unik5 ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$e2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$e2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>

                    <?php } else { ?>
                    <?php if ($linkid_taman == "operasional_yayasan") { ?>
                    <li class="page-item active">
                        <a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=laporan_logistik"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($e2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $e2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="page-item active">
                        <a class="page-link" href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2+$a2+$c2+$g2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$c2+$g2 ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>

                    <?php } ?>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Laporan :</b>
                        <hr>
                    </label>
                    <!-- gaji -->
                    <?php if ($_GET["id_management"] == "gaji") { ?>
                    <?php include '../data_management/laporan/gaji_karyawan.php'; ?>

                    <!-- asset -->
                    <?php } elseif ($_GET["id_management"] == "aset") { ?>
                    <?php include '../data_management/laporan/aset.php'; ?>

                    <!-- lainnya -->
                    <?php } elseif ($_GET["id_management"] == "lainnya") { ?>
                    <?php include '../data_management/laporan/lainnya.php'; ?>

                    <!-- logistik -->
                    <?php } else { ?>
                    <?php include '../data_management/laporan/logistik.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>