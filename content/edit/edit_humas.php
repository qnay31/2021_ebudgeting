<?php

if (isset($_POST["input_humas"]) ) {
    $link = $_SESSION["username"];
    if(edit_anggaran_humas($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil Diedit');
                    document.location.href = '../user/$link.php?id_input=verifikasi_humas';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }


    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // humas
    $query      = mysqli_query($conn, "SELECT * FROM humas WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["program"];
    $nama       = $data["nama"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_pengajuan"];
    $deskripsi  = $data["deskripsi"];
    $dana       = $data["dana_anggaran"];


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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_humas&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Pengajuan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit Pengajuan Anggaran</b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_input(this)">
                    <div class="mb-3">
                        <div class="form-text mb-2">
                            Perencanaan
                        </div>
                        <input type="hidden" name="id" value="<?= $unik ?>">
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Diajukan Oleh
                        </div>
                        <input type="text" class="form-control" name="nama" value="<?= $nama ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Posisi
                        </div>
                        <input type="text" class="form-control" name="posisi" value="<?= $has_kueri["posisi"] ?>"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Pengajuan
                        </div>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Deskripsi Anggaran
                        </div>
                        <input type="text" class="form-control" name="deskripsi"
                            placeholder="Contoh: Logistik Komsumtif gedung" id="alpabet" value="<?= $deskripsi ?>"
                            style="text-transform: capitalize;" autocomplete="off">
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Masukan Anggaran Kamu
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($dana,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <input type="submit" name="input_humas" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>