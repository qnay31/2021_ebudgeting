<?php
if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(edit_daily($_POST) > 0 ) {
            echo "<script>
                    alert('Daily Report Berhasil Diedit');
                    document.location.href = '$link.php?id_input=daily_program';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    
    }

    if (isset($_POST["input_ap"]) ) {
        $link = $_SESSION["username"];
        if(edit_daily($_POST) > 0 ) {
                echo "<script>
                        alert('Daily Report Berhasil Diedit');
                        document.location.href = '$link.php?id_input=daily_program';
                    </script>";
                    
            } 
                else {
                echo mysqli_error($conn);
            }
        
        
        
        }
    
    $unik     = $_GET["id_unik"];
    $periode  = $_GET["id_p"]; 
    
    // program
    $query      = mysqli_query($conn, "SELECT * FROM daily_report WHERE id = '$unik' AND MONTH(tgl_aktivitas) = '$periode' ");
    $data       = mysqli_fetch_assoc($query);
    $nama       = $data["nama"];
    $posisi     = $data["posisi"];
    $cabang     = $data["cabang"];
    $tgl_aktivitas     = $data["tgl_aktivitas"];
    $aktivitas     = $data["aktivitas"];
    $deskripsi     = $data["deskripsi"];  
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
                        href="<?= $_SESSION["username"] ?>.php?id_edit=edit_daily&id_unik=<?= $unik ?>&id_p=<?= $periode ?>">
                        <small class="text-white">Edit Daily Report&nbsp;
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
                <div id="form">
                    <form action="" method="post" onsubmit="return validasi_input3(this)">
                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Posisi
                            </div>
                            <input type="hidden" name="id" value="<?= $unik?>">
                            <input type="hidden" name="posisi" value="<?= $has_kueri["posisi"] ?>">
                            <input type="text" class="form-control" name="posisi" value="<?= $posisi ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Penginput Daily
                            </div>
                            <input type="text" class="form-control" name="nama" value="<?= $nama ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Cabang
                            </div>
                            <input type="text" class="form-control" name="cabang" value="<?= $cabang ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Tanggal Aktivitas <b>EDIT</b>
                            </div>
                            <input type="date" class="form-control" name="tanggal" value="<?= $tgl_aktivitas?>">
                        </div>

                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Aktivitas <b>EDIT</b>
                            </div>
                            <input type="text" class="form-control" name="aktivitas" placeholder="Kunjungan"
                                id="alpabet" style="text-transform: capitalize;" autocomplete="off"
                                value="<?= $aktivitas?>">
                        </div>

                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Deskripsi Aktivitas <b>EDIT</b>
                            </div>
                            <input type="text" class="form-control" name="deskripsi"
                                placeholder="Datang Berkunjung Kerumah Yatim" id="alpabet2"
                                style="text-transform: capitalize;" autocomplete="off" value="<?= $deskripsi ?>">
                        </div>
                        <div class="button">
                            <?php if ($pengurus_id == "ap_pendidikan") { ?>
                            <input type="submit" name="input_ap" class="btn btn-primary w-100" value="ubah data">
                            <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
                            <input type="submit" name="input_ap" class="btn btn-primary w-100" value="ubah data">
                            <?php } else { ?>
                            <input type="submit" name="input" class="btn btn-primary w-100" value="ubah data">
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>