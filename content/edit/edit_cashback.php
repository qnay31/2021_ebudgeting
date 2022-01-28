<?php

if (isset($_POST["input_cashback"]) ) {
    $link = $_SESSION["username"];
    if(edit_cashback($_POST) > 0 ) {
            echo "<script>
                    alert('Data cashback Telah Diubah');
                    document.location.href = '../user/$link.php?id_link_cashback=$linkid_cashback&id_input=verifikasi_cashback';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }


    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // cashback
    $query      = mysqli_query($conn, "SELECT * FROM cashback WHERE id = '$unik' AND MONTH(tgl_cashback) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
    $nama       = $data["nama"];
    $deskripsi  = $data["deskripsi"];
    $tanggal    = $data["tgl_cashback"];
    $cashback   = $data["cashback"];


    // die(var_dump($s));
    
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
            <ul class="pagination shadow-lg">
                <li class="page-item active"><a class="page-link"
                        href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_edit=edit_cashback&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            pemasukan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit <?= ucwords($deskripsi) ?> </b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_media(this)">
                    <div class="mb-3">
                        <div class="form-text mb-2">
                            Kategori
                        </div>
                        <input type="text" class="form-control" name="program" value="<?= $kategori ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Cashback <b>* EDIT</b>
                        </div>
                        <input type="hidden" name="id" value="<?= $unik ?>">
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>" required
                            oninvalid="this.setCustomValidity('Tanggal Cashback Harus Diisi')"
                            oninput="this.setCustomValidity('')">
                    </div>

                    <div class=" mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Keterangan
                        </div>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Keterangan cashback"
                            id="alpabet" style="text-transform: capitalize;" autocomplete="off"
                            value="<?= $deskripsi ?>" required
                            oninvalid="this.setCustomValidity('Keterangan Cashback Harus Diisi')"
                            oninput="this.setCustomValidity('')">
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Cashback yang telah diinput <b>* EDIT</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="cashback" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($cashback,0,"." , ".") ?>" required
                            oninvalid="this.setCustomValidity('Jumlah Cashback Harus Diisi')"
                            oninput="this.setCustomValidity('')">
                    </div>
                    <div class="button">
                        <input type="submit" name="input_cashback" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>