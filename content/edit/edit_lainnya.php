<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(edit_lainnya($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil Diedit');
                    document.location.href = '$link.php?id_input=verifikasi_logistik&id_management=lainnya';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    
    }

    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // program
    $query      = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["kategori"];
    $nama       = $data["nama"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_dibuat"];
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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_lainnya&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Pengajuan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit Pengajuan <?= $program ?></b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_input(this)">
                    <div class="mb-1">
                        <div class="form-text mb-2">
                            Kategori <b>Edit</b>
                        </div>
                        <input type="hidden" name="id" value="<?= $unik?>">
                        <input type="hidden" name="posisi" value="<?= $has_kueri["posisi"] ?>">
                        <input type="hidden" name="nama" value="<?= $nama ?>">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Pengajuan <b>Edit</b>
                        </div>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Deskripsi Logistik <b>Edit</b>
                        </div>
                        <input type="text" class="form-control" name="deskripsi"
                            placeholder="Contoh: anggaran dan lain lain" id="alpabet" value="<?= $deskripsi ?>"
                            style="text-transform: capitalize;" autocomplete="off">
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Anggaran <b>Edit</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($dana,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <input type="submit" name="input" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>