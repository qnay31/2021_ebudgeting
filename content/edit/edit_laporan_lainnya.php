<?php



if (isset($_POST["input_lainnya"]) ) {
    $link = $_SESSION["username"];
    if(edit_laporan_lainnya($_POST) > 0 ) {
        echo "<script>
                alert('Data Laporan Berhasil Diedit');
                document.location.href = '$link.php?id_input=laporan_logistik&id_management=lainnya';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }

}



// anggaran lainya
$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query      = mysqli_query($conn, "SELECT * FROM anggaran_lain WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
$data       = mysqli_fetch_assoc($query);
$program    = $data["kategori"];
$nama       = $data["nama"];
$cabang     = $data["cabang"];
$tanggal    = $data["tgl_laporan"];
$deskripsi  = $data["pemakaian"];
$dana       = $data["dana_terpakai"];

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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_lainnya&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Laporan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit Laporan lainnya</b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_input2(this)">
                    <div>
                        <div class="form-text mb-2">
                            Data Laporan
                        </div>
                        <input type="hidden" name="id" value="<?= $unik?>">
                        <input type="hidden" name="posisi" value="<?= $posisi?>">
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>
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
                            placeholder="Contoh: lainnya Mobil" id="alpabet" value="<?= $deskripsi ?>"
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
                        <input type="submit" name="input_lainnya" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>