<?php

if (isset($_POST["input_gaji"]) ) {
    $link = $_SESSION["username"];
    if(edit_gaji($_POST) > 0 ) {
            echo "<script>
                    alert('Data Gaji Karyawan Telah Diubah');
                    document.location.href = '../user/$link.php?id_input=verifikasi_logistik&id_management=gaji';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }


    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // gaji
    $query      = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $kategori   = $data["kategori"];
    $cabang     = $data["cabang"];
    $gedung     = $data["gedung"];
    $nama       = $data["nama"];
    $tanggal    = $data["tgl_dibuat"];
    $deskripsi  = $data["deskripsi"];
    $gaji       = $data["gaji_karyawan"];


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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_gaji&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit Gaji Karyawan&nbsp;
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
                        <div class="form-text mb-2">
                            Cabang
                        </div>
                        <input type="text" class="form-control" value="<?= $cabang ?>" readonly>
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

                    <div id="disabledSelect" class="form-text mb-2">
                        Gaji Yang Telah Diinput <b>* EDIT</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($gaji,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <input type="submit" name="input_gaji" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>