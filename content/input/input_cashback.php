<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
        if(cashback($_POST) > 0 ) {
            echo "<script>
                    alert('Data cashback berhasil dikirim');
                    document.location.href = '$link.php?id_input=verifikasi_cashback';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }

// cashback
$q  = mysqli_query($conn, "SELECT * FROM cashback WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'Menunggu Verifikasi' ORDER BY `tgl_cashback` DESC");

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
                            href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_input=input_cashback"><small
                                class="text-white">Cashback</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_input=verifikasi_cashback"></i><small>Verifikasi&nbsp;</small>
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
                    <label for=""><b>Input Cashback:</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_input(this)" class="user">
                            <div class="input-group mb-3">
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Dana</b></label>
                                </div>
                                <input type="text" class="form-control" name="program" value="Cashback" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-text mb-2">
                                    Tanggal Cashback
                                </div>
                                <input type="date" class="form-control" name="tanggal" required
                                    oninvalid="this.setCustomValidity('Tanggal Cashback Harus Diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>

                            <div class=" mb-3">
                                <div id="disabledSelect" class="form-text mb-2">
                                    Keterangan
                                </div>
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Keterangan cashback" id="alpabet" style="text-transform: capitalize;"
                                    autocomplete="off" required
                                    oninvalid="this.setCustomValidity('Keterangan Cashback Harus Diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>

                            <div id=" disabledSelect" class="form-text mb-2">
                                Jumlah Cashback
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                                <input type="text" class="form-control" name="cashback" id="rupiah" maxlength="11"
                                    placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                                    required oninvalid="this.setCustomValidity('Jumlah Cashback Harus Diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class=" button">
                                <input type="submit" name="input" class="btn btn-primary w-100" value="Kirim Data">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>