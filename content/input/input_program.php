<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
        if(anggaran_program($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil diproses');
                    document.location.href = '$link.php?id_input=verifikasi_program';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }

// program
$q  = mysqli_query($conn, "SELECT * FROM program WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");

$s = $q->num_rows;


$q2  = mysqli_query($conn, "SELECT * FROM program WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Menunggu Konfirmasi' ORDER BY `tgl_pengajuan` DESC");

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
                            href="<?= $_SESSION["username"] ?>.php?id_input=input_program"><small
                                class="text-white">Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_program"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=laporan_program"><small>Laporan&nbsp;</small>
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
                                    <label class="input-group-text" for="inputGroupSelect01"><b>PROGRAM</b></label>
                                </div>
                                <?php if($_SESSION["id_pengurus"] == 'kepala_program'){ ?>
                                <select class="custom-select" aria-label="Default select example" name="program">
                                    <option selected value="">Pilih Salah Satu Program</option>
                                    <option value="Program Santunan Yatim">Santunan Yatim</option>
                                    <option value="Program Uang Saku Yatim">Uang Saku Yatim</option>
                                    <option value="Program Ceria Yatim">Ceria Yatim</option>
                                    <option value="Program Belanja Yatim">Belanja Yatim</option>
                                    <option value="Program Papan Yatim">Papan Yatim</option>
                                    <option value="Program Bakti Sosial">Bakti Sosial</option>
                                    <option value="Program Makan Sehat Yatim">Makan Sehat Yatim</option>
                                    <option value="Program Sembako Yatim">Sembako Yatim</option>
                                    <option value="Program Pesantren Yatim">Pesantren Yatim</option>
                                    <option value="Gaji Kepala Sekolah">Gaji Kepala Sekolah</option>
                                    <option value="Gaji Penjemput">Gaji Penjemput</option>
                                </select>
                                <?php } elseif ($_SESSION["id_pengurus"] == 'kepala_cabang') {?>
                                <select class="custom-select" aria-label="Default select example" name="program">
                                    <option selected value="">Pilih Salah Satu Program</option>
                                    <option value="Program Santunan Yatim">Santunan Yatim</option>
                                    <option value="Program Uang Saku Yatim">Uang Saku Yatim</option>
                                    <option value="Program Ceria Yatim">Ceria Yatim</option>
                                    <option value="Program Belanja Yatim">Belanja Yatim</option>
                                    <option value="Program Papan Yatim">Papan Yatim</option>
                                    <option value="Program Bakti Sosial">Bakti Sosial</option>
                                    <option value="Program Makan Sehat Yatim">Makan Sehat Yatim</option>
                                    <option value="Program Sembako Yatim">Sembako Yatim</option>
                                    <option value="Program Pesantren Yatim">Pesantren Yatim</option>
                                </select>
                                <?php } else { ?>
                                <input type="text" class="form-control" name="program"
                                    value="<?= $has_kueri["posisi"]; ?>" readonly>
                                <?php } ?>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text mb-2">
                                    Tanggal Pengajuan
                                </div>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <div id="disabledSelect" class="form-text mb-2">
                                    Deskripsi Program
                                </div>
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Contoh: Santunan Rutin" id="alpabet"
                                    style="text-transform: capitalize;" autocomplete="off">
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