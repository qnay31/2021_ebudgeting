<?php

if ($pengurus_id == "kepala_produksi") {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(edit_laporan_kepalaLogistik($_POST) > 0 ) {
            echo "<script>
                    alert('Data Laporan Berhasil Diedit');
                    document.location.href = '$link.php?id_input=laporan_produksi';
                </script>";           
        } 
            else {
            echo mysqli_error($conn);
        }
    
    }
} else {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(edit_laporan_kepalaLogistik($_POST) > 0 ) {
            echo "<script>
                    alert('Data Laporan Berhasil Diedit');
                    document.location.href = '$link.php?id_link_logistik=$linkid_logistik&id_input=laporan_$linkid_logistik';
                </script>";           
        } 
            else {
            echo mysqli_error($conn);
        }
    
    }
}

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
if ($pengurus_id == "kepala_produksi") {
        // produksi
        $query      = mysqli_query($conn, "SELECT * FROM produksi WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["produksi"];
        $jenis      = $data["jenis"];
        $nama       = $data["nama"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pemakaian"];
        $deskripsi  = $data["deskripsi_pemakaian"];
        $qty        = $data["qty_pembelian"];
        $dana       = $data["dana_terpakai"];
} else {
    if ($linkid_logistik == 'baksos') {
        // baksos
    $query      = mysqli_query($conn, "SELECT * FROM baksos WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["program"];
    $nama       = $data["nama"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_pemakaian"];
    $deskripsi  = $data["deskripsi_pemakaian"];
    $dana       = $data["dana_terpakai"];
    
    } elseif ($linkid_logistik == 'maintenance') {
        // maintenance
        $query      = mysqli_query($conn, "SELECT * FROM maintenance WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
        $data       = mysqli_fetch_assoc($query);
        $program    = $data["kategori"];
        $maintenance= $data["maintenance"];
        $nama       = $data["nama"];
        $cabang     = $data["cabang"];
        $tanggal    = $data["tgl_pemakaian"];
        $deskripsi  = $data["deskripsi_pemakaian"];
        $dana       = $data["dana_terpakai"];
    
    } else {
        // produksi
    $query      = mysqli_query($conn, "SELECT * FROM produksi WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["produksi"];
    $jenis      = $data["jenis"];
    $nama       = $data["nama"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_pemakaian"];
    $deskripsi  = $data["deskripsi_pemakaian"];
    $qty        = $data["qty_pembelian"];
    $dana       = $data["dana_terpakai"];
    }
}

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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_produksi&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Laporan&nbsp;
                        </small>
                    </a></li>
                <?php } else { ?>
                <li class="page-item active"><a class="page-link"
                        href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_edit=edit_laporan_<?= $linkid_logistik ?>&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Laporan&nbsp;
                        </small>
                    </a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit Laporan RAB</b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_input2(this)">
                    <div>
                        <div class="form-text mb-2">
                            Data Laporan
                        </div>
                        <input type="hidden" name="id" value="<?= $unik?>">
                        <input type="text" class="form-control" name="program" style="text-transform: capitalize;"
                            value="<?= $program ?>" readonly>
                        <?php if ($pengurus_id == "kepala_produksi") { ?>
                        <input type="text" class="form-control" style="text-transform: capitalize;"
                            value="Cabang <?= $cabang ?>" readonly>
                        <?php } ?>
                        <?php if ($linkid_logistik == 'maintenance') { ?>
                        <input type="text" class="form-control" name="maintenance" value="<?= $maintenance ?>" readonly>
                        <?php } ?>
                        <input type="hidden" class="form-control" name="posisi" value="<?= $posisi ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Pemakaian <b>(EDIT)</b>
                        </div>
                        <input type="date" class="form-control" name="tanggal_laporan" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Deskripsi Pemakaian <b>(EDIT)</b>
                        </div>
                        <input type="text" class="form-control" name="deskripsi_laporan"
                            placeholder="Contoh: laporan pembelanjaan" id="alpabet" value="<?= $deskripsi ?>"
                            style="text-transform: capitalize;" autocomplete="off">
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Terpakai <b>(EDIT)</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="dana_laporan" id="rupiah" maxlength="11"
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