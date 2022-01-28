<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
        if(anggaran_humas($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil diproses');
                    document.location.href = '$link.php?id_input=verifikasi_humas';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }

// logistik
$q  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM humas WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status = 'OK' AND status_b ='OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan` DESC");

$s2 = $q2->num_rows;

// die(var_dump($pengurus_id));


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=input_humas"><small
                                class="text-white">Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_humas"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_humas"><small>Laporan&nbsp;</small>
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
                    <label for=""><b>Input Pengajuan:</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_input(this)" class="user">
                            <div class="input-group mb-3">
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <input type="hidden" name="cabang" value="<?= $_SESSION["cabang"] ?>">
                                <input type="hidden" name="posisi" value="<?= $posisi ?>">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Perlengkapan</b></label>
                                </div>
                                <input type="text" class="form-control" name="program" value="Logistik Humas" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text mb-2">
                                    Tanggal Pengajuan
                                </div>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <div id="disabledSelect" class="form-text mb-2">
                                    Deskripsi Rencana
                                </div>
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Contoh: Beli Celengan" id="alpabet" style="text-transform: capitalize;"
                                    autocomplete="off">
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