<?php

if ($pengurus_id == "kepala_produksi") {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(edit_kepala_logistik($_POST) > 0 ) {
                echo "<script>
                        alert('Data anggaran produksi Berhasil Diedit');
                        document.location.href = '../user/$link.php?id_input=verifikasi_produksi';
                    </script>";        
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        }
} else {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(edit_kepala_logistik($_POST) > 0 ) {
                echo "<script>
                        alert('Data anggaran $linkid_logistik Berhasil Diedit');
                        document.location.href = '../user/$link.php?id_link_logistik=$linkid_logistik&id_input=verifikasi_$linkid_logistik';
                    </script>";        
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        }
}

    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 

    if ($pengurus_id == 'kepala_produksi') {
        $query      = mysqli_query($conn, "SELECT * FROM produksi WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["produksi"];
        $jenis      = $data["jenis"];
        $nama       = $data["nama"];
        $qty        = $data["qty_anggaran"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pengajuan"];
        $deskripsi  = $data["perencanaan"];
        $dana       = $data["dana_anggaran"];
    } else {
        if ($linkid_logistik == 'baksos') {
        // baksos
        $query      = mysqli_query($conn, "SELECT * FROM $linkid_logistik WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["program"];
        $nama       = $data["nama"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pengajuan"];
        $deskripsi  = $data["deskripsi"];
        $dana       = $data["dana_anggaran"];
        
    } elseif ($linkid_logistik == 'maintenance') {
        // maintena
        $query      = mysqli_query($conn, "SELECT * FROM $linkid_logistik WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["kategori"];
        $jenis      = $data["maintenance"];
        $nama       = $data["nama"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pengajuan"];
        $deskripsi  = $data["perencanaan"];
        $dana       = $data["dana_anggaran"];

    } else {
        // produksi
        $query      = mysqli_query($conn, "SELECT * FROM $linkid_logistik WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["produksi"];
        $jenis      = $data["jenis"];
        $nama       = $data["nama"];
        $qty        = $data["qty_anggaran"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pengajuan"];
        $deskripsi  = $data["perencanaan"];
        $dana       = $data["dana_anggaran"];
    }
    }


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
                <?php if ($pengurus_id == "kepala_produksi") { ?>
                <li class="page-item active"><a class="page-link"
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_produksi&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Pengajuan&nbsp;
                        </small>
                    </a></li>
                <?php } else { ?>
                <li class="page-item active"><a class="page-link"
                        href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_edit=edit_<?= $linkid_logistik ?>&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Pengajuan&nbsp;
                        </small>
                    </a></li>
                <?php } ?>
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
                        <?php if ($linkid_logistik == 'maintenance') { ?>
                        <input type="text" class="form-control" style="text-transform: capitalize;"
                            value="<?= $program ?> <?= $jenis ?>" readonly>
                        <input type="hidden" class="form-control" name="program" value="<?= $program ?>" readonly>
                        <?php } else { ?>
                        <input type="text" class="form-control" name="program" style="text-transform: capitalize;"
                            value="<?= $program ?>" readonly>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Diajukan Oleh
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
                        <input type="submit" name="input" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>