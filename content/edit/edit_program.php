<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(edit_anggaran_program($_POST) > 0 ) {
            echo "<script>
                    alert('Data anggaran Berhasil Diedit');
                    document.location.href = '$link.php?id_check=check_program';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    
    }

    if (isset($_POST["input_program"]) ) {
        $link = $_SESSION["username"];
        if(edit_anggaran_program($_POST) > 0 ) {
                echo "<script>
                        alert('Data anggaran Berhasil Diedit');
                        document.location.href = '$link.php?id_input=verifikasi_program';
                    </script>";
                    
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        
        }

    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // program
    $query      = mysqli_query($conn, "SELECT * FROM program WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_program&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
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
                    <div class="mb-1">
                        <div class="form-text mb-2">
                            Program <b>Edit</b>
                        </div>
                        <input type="hidden" name="id" value="<?= $unik?>">
                        <input type="hidden" name="posisi" value="<?= $has_kueri["posisi"] ?>">
                        <input type="hidden" name="nama" value="<?= $nama ?>">
                    </div>
                    <div class="input-group mb-3">
                        <?php if ($pengurus_id == "kepala_program" && $program == "Program Kesehatan") { ?>
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>

                        <?php } elseif ($pengurus_id == "kepala_program" && $program == "Program Pendidikan") { ?>
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>

                        <?php } elseif ($pengurus_id == "kepala_program") { ?>
                        <select class="form-control" name="program">
                            <option selected="" value="<?= $program ?>"><?= $program ?></option>
                            <option value="Program Santunan Yatim">Program Santunan Yatim</option>
                            <option value="Program Uang Saku Yatim">Program Uang Saku Yatim</option>
                            <option value="Program Ceria Yatim">Program Ceria Yatim</option>
                            <option value="Program Belanja Yatim">Program Belanja Yatim</option>
                            <option value="Program Papan Yatim">Program Papan Yatim</option>
                            <option value="Program Bakti Sosial">Program Bakti Sosial</option>
                            <option value="Program Makan Sehat Yatim">Program Makan Sehat Yatim</option>
                            <option value="Program Sembako Yatim">Program Sembako Yatim</option>
                            <option value="Program Pesantren Yatim">Program Pesantren Yatim</option>
                            <option value="Gaji Kepala Sekolah">Gaji Kepala Sekolah</option>
                            <option value="Gaji Penjemput">Gaji Penjemput</option>
                            <option value="Operasional Program">Operasional Program</option>
                        </select>
                        <?php } else { ?>
                        <input type="text" class="form-control" name="program" value="<?= $program ?>" readonly>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Tanggal Pengajuan <b>Edit</b>
                        </div>
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                    </div>
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Deskripsi Program <b>Edit</b>
                        </div>
                        <input type="text" class="form-control" name="deskripsi"
                            placeholder="Contoh: Santunan bulanan tanggal 27 mei" id="alpabet" value="<?= $deskripsi ?>"
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
                        <?php if ($pengurus_id == "kepala_program") { ?>
                        <input type="submit" name="input" class="btn btn-primary w-100" value="Ubah Data">

                        <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
                        <input type="submit" name="input" class="btn btn-primary w-100" value="Ubah Data">
                        <?php } else { ?>
                        <input type="submit" name="input_program" class="btn btn-primary w-100" value="Ubah Data">
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>