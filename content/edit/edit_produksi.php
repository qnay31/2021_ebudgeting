<?php

if (isset($_POST["input_produksi"]) ) {
    $link = $_SESSION["username"];
    if(edit_anggaran_produksi($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil Diedit');
                    document.location.href = '../user/$link.php?id_input=verifikasi_produksi';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }


    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // produksi
    $query      = mysqli_query($conn, "SELECT * FROM produksi WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["program"];
    $jenis      = $data["jenis"];
    $nama       = $data["nama"];
    $qty        = $data["qty_anggaran"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_pengajuan"];
    $deskripsi  = $data["perencanaan"];
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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_produksi&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
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
                <form action="" method="post" onsubmit="return validasi_produksi(this)">
                    <div class="mb-3">
                        <div class="form-text mb-2">
                            Produksi
                        </div>
                        <input type="hidden" name="id" value="<?= $unik ?>">
                        <input type="text" class="form-control" name="kategori" value="<?= $program ?>" readonly>
                        <input type="hidden" name="jenis" value="<?= $jenis ?>">
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
                            Tanggal Pengajuan <b>*EDIT</b>
                        </div>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Deskripsi Anggaran <b>*EDIT</b>
                        </div>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Contoh: <?= $deskripsi ?>"
                            id="alpabet" value="<?= $deskripsi ?>" style="text-transform: capitalize;"
                            autocomplete="off">
                    </div>

                    <?php if ($jenis == 'Lele') { ?>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Qty Perencanaan <b>(Kg)</b> <b>*EDIT</b>
                        </div>
                        <input type="text" class="form-control" name="qty"
                            value="<?= number_format($qty,0,"." , ".") ?>" id="rupiah2"
                            onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                    </div>
                    <?php } else { ?>
                    <?php } ?>

                    <div id="disabledSelect" class="form-text mb-2">
                        Masukan Anggaran Kamu <b>*EDIT</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="anggaran" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($dana,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <input type="submit" name="input_produksi" class="btn btn-primary w-100" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>