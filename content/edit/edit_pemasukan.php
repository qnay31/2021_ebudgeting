<?php

$id = $_GET["id_pemasukan"];

$id_income = substr($id,10);

if (isset($_POST["input_celengan"]) ) {
    $link = $_SESSION["username"];
    $id = $_GET["id_pemasukan"];
    $id_income = substr($id,10);
    if(edit_pemasukan($_POST) > 0 ) {
            echo "<script>
                    alert('Data Pemasukan Berhasil Diedit');
                    document.location.href = '../user/$link.php?id_pemasukan=pemasukan_$id_income';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }

    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        $id = $_GET["id_pemasukan"];
        $id_income = substr($id,10);
        if(edit_pemasukan($_POST) > 0 ) {
                echo "<script>
                        alert('Data Pemasukan Berhasil Diedit');
                        document.location.href = '../user/$link.php?id_pemasukan=pemasukan_$id_income';
                    </script>";
                    
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        }



    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // pemasukan
    $query      = mysqli_query($conn, "SELECT * FROM pemasukan WHERE id = '$unik' AND MONTH(tgl_ambil) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $program    = $data["kategori"];
    $nama       = $data["nama"];
    $cabang     = $data["cabang"];
    $tanggal    = $data["tgl_ambil"];
    $lokasi  = $data["lokasi"];
    $jumlah  = $data["jumlah"];
    $dana       = $data["income"];


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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_pemasukan&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit
                            Pemasukan&nbsp;
                        </small>
                    </a></li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Edit Pemasukan Anggaran</b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_income(this)">
                    <div class="mb-3">
                        <div class="form-text mb-2">
                            Kategori
                        </div>
                        <input type="hidden" name="id" value="<?= $unik ?>">
                        <input type="hidden" name="nama" value="<?= $nama ?>">
                        <input type="hidden" name="posisi" value="<?= $has_kueri["posisi"] ?>">
                        <input type="text" class="form-control" name="program" value="<?= $program ?>"
                            style="text-transform: capitalize;" readonly>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Pemasukan <b>*EDIT</b>
                        </div>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Lokasi <b>*EDIT</b>
                        </div>
                        <input type="text" class="form-control" name="lokasi" placeholder="Contoh: gedung/toko"
                            id="alpabet" value="<?= $lokasi ?>" style="text-transform: capitalize;" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Jumlah Pengambilan <b>*EDIT</b>
                        </div>
                        <input type="text" class="form-control" name="jumlah" placeholder="Contoh: gedung/toko"
                            id="alpabet" value="<?= $jumlah ?>" style="text-transform: capitalize;" autocomplete="off">
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Income <b>*EDIT</b>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                        <input type="text" class="form-control" name="income" id="rupiah" maxlength="11"
                            placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off"
                            value="<?= number_format($dana,0,"." , ".") ?>">
                    </div>
                    <div class="button">
                        <?php if ($id_income == "celengan") {?>
                        <input type="submit" name="input_celengan" class="btn btn-primary w-100"
                            value="Ubah Data Celengan">
                        <?php } else { ?>
                        <input type="submit" name="input" class="btn btn-primary w-100" value="Ubah Data Kotak">
                        <?php }?>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>