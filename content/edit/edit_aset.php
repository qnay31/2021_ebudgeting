<?php

if (isset($_POST["input_aset"]) ) {
    $link = $_SESSION["username"];
    if(edit_aset($_POST) > 0 ) {
            echo "<script>
                    alert('Data Aset Yayasan Telah Diubah');
                    document.location.href = '../user/$link.php?id_input=verifikasi_logistik&id_management=aset';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }


    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // aset
    $query      = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
    $jenis      = $data["jenis"];
    $nama       = $data["nama"];
    $tanggal    = $data["tgl_dibuat"];
    $deskripsi  = $data["deskripsi"];
    $qty        = $data["qty_anggaran"];
    $aset       = $data["dana_anggaran"];


    // die(var_dump($query));
    
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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_aset&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit Aset Yayasan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit <?= $kategori ?> </b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_input(this)">
                    <div class="mb-3">
                        <div class="form-text mb-2">
                            Keterangan
                        </div>
                        <input type="text" class="form-control" name="program" value="<?= $kategori ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal dibuat <b>* EDIT</b>
                        </div>
                        <input type="hidden" name="id" value="<?= $unik ?>">
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>

                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Perencanaan <b>* EDIT</b>
                        </div>
                        <input type="text" class="form-control" name="deskripsi" value="<?= ucwords($deskripsi) ?>"
                            placeholder="Deskripsi perencanaan" style="text-transform: capitalize;">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><b>Qty</b></label>
                        </div>
                        <input type="text" name="qty" id="rupiah2" value="<?= $qty ?>" class="form-control"
                            onkeypress="return hanyaAngka(event)" autocomplete="off" placeholder="Qty Perencanaan: 10"
                            required oninvalid="this.setCustomValidity('Masukkan Qty Perencanaan')"
                            oninput="this.setCustomValidity('')">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><b>Pcs</b></label>
                        </div>
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Anggaran Yang Telah Diinput <b>* EDIT</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($aset,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <input type="submit" name="input_aset" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>