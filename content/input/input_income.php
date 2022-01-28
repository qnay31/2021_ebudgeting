<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
        if(income_media($_POST) > 0 ) {
            echo "<script>
                    alert('Data income berhasil dikirim');
                    document.location.href = '$link.php?id_input=input_income';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }

// income media sosial
$q  = mysqli_query($conn, "SELECT * FROM income WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'Menunggu Verifikasi' ORDER BY `tgl_pemasukan` DESC");

$s = $q->num_rows;

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
                            href="<?= $_SESSION["username"] ?>.php?id_input=input_income"><small
                                class="text-white">Income</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_income"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Input Income:</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_media(this)" class="user">
                            <div class="input-group mb-3">
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <input type="hidden" name="posisi" value="<?= $posisi ?>">
                                <input type="hidden" name="kategori" value="Pemasukan Harian">
                                <select class="custom-select" aria-label="Default select example" name="gedung">
                                    <option selected value="">Pilih Salah Satu Gedung</option>
                                    <option value="A">Gedung A Dan B</option>
                                    <option value="B">Gedung C Dan D</option>
                                    <option value="Instagram">Gedung Instagram</option>
                                    <option value="Bogor">Gedung Bogor</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text mb-2">
                                    Tanggal Pemasukan
                                </div>
                                <input type="date" class="form-control" name="tanggal">
                            </div>

                            <div id="disabledSelect" class="form-text mb-2">
                                Jumlah Income
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                                <input type="text" class="form-control" name="income" id="rupiah" maxlength="11"
                                    placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off">
                            </div>
                            <div class="button">
                                <input type="submit" name="input" class="btn btn-primary w-100" value="laporkan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>