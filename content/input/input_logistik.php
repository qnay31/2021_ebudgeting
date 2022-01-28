<?php

if ($linkid_taman == "operasional_yayasan") {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
            if(anggaran_logistik($_POST) > 0 ) {
                echo "<script>
                        alert('Data anggaran Berhasil diproses');
                        document.location.href = '$link.php?id_taman=$linkid_taman&id_input=verifikasi_logistik';
                    </script>";
                    
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        }
} else {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
            if(anggaran_logistik($_POST) > 0 ) {
                echo "<script>
                        alert('Data anggaran Berhasil diproses');
                        document.location.href = '$link.php?id_input=verifikasi_logistik';
                    </script>";
                    
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        }
}


// logistik
$q  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM logistik WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

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

// die(var_dump($nama_pengurus));

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <?php if ($linkid_taman == "operasional_yayasan") { ?>
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=input_logistik"><small
                                class="text-white">Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_input=verifikasi_logistik"></i><small>Verifikasi&nbsp;</small>
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
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=input_logistik"><small
                                class="text-white">Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s+$a+$aset+$aln == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s+$a+$aset+$aln ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik"><small>Laporan&nbsp;</small>
                            <?php if($s2+$a2+$aset2+$aln2  == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2+$a2+$aset2+$aln2  ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } ?>

                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Input Pengajuan:</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_input(this)" class="user">
                            <div class="input-group mb-3">
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <input type="hidden" name="cabang" value="<?= $_SESSION["cabang"] ?>">
                                <input type="hidden" name="posisi" value="<?=$posisi ?>">
                                <?php if ($linkid_taman == "operasional_yayasan") { ?>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Kategori</b></label>
                                </div>
                                <input type="text" class="form-control" name="program" value="Operasional Yayasan"
                                    readonly>
                                <?php } else { ?>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Logistik</b></label>
                                </div>
                                <?php if ($posisi == 'Logistik Gedung Management') { ?>
                                <select class="custom-select" aria-label="Default select example" name="program"
                                    id="management">
                                    <option selected value="">Pilih Salah Satu Logistik</option>
                                    <option value="<?=$posisi ?>"><?=$posisi ?></option>
                                    <option value="Gaji Karyawan">Gaji Karyawan</option>
                                    <option value="Aset Yayasan">Aset Yayasan</option>
                                    <!-- <option value="Uang Makan">Uang Makan</option> -->
                                    <option value="Anggaran Lainnya">Anggaran Lainnya</option>
                                </select>
                                <?php } else { ?>
                                <input type="text" class="form-control" name="program" value="<?=$posisi ?>" readonly>
                                <?php } ?>
                                <?php } ?>

                            </div>
                            <div class="input-group disabled" id="bagian">
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text mb-2">
                                    Tanggal Pengajuan
                                </div>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <div id="disabledSelect" class="form-text mb-2">
                                    Deskripsi Perencanaan
                                </div>
                                <?php if ($linkid_taman == "operasional_yayasan") { ?>
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Contoh: operasional keluar kota" id="alpabet"
                                    style="text-transform: capitalize;" autocomplete="off">
                                <?php } else { ?>
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Contoh: Logistik Konsumtif" id="alpabet"
                                    style="text-transform: capitalize;" autocomplete="off">
                                <?php } ?>

                            </div>

                            <div id="disabledSelect" class="form-text mb-2">
                                Masukan Anggaran Kamu
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                                <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                                    placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off">
                            </div>
                            <div class="button">
                                <input type="submit" name="input" class="btn btn-primary w-100" value="Ajukan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>