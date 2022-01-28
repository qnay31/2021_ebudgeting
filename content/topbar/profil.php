<?php
error_reporting(0);

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(change_profil($_POST) > 0 ) {
        echo "<script>
                alert('Profil Berhasil Disimpan');
                document.location.href = '$link.php?id_topbar=profil';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}
// die(var_dump($profil));
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_topbar=profil"> <small class="text-white">My
                                Profil&nbsp;
                            </small>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Detail Profil :</b>
                        <hr>
                    </label>

                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validasi_profil(this)">
                        <div class="input-group mb-3 upload_image">
                            <div class="avatar-wrapper">
                                <?php if ($profil == 'profil.png') { ?>
                                <img class="profile-pic" src="../img/profil/<?= $profil ?>" />
                                <?php } else { ?>
                                <img class="profile-pic" src="../img/profil/thump_<?= $profil ?>" />
                                <?php } ?>
                                <div class="upload-button">
                                    <p class="label">Ganti Foto Profil</p>
                                </div>
                                <input type="hidden" name="img" value="<?= $profil ?>">
                                <input class="file-upload" type="file" name="gambar" accept="image/*" />
                            </div>
                        </div>
                        <?php if ($profil == 'profil.png') {?>

                        <?php } else { ?>
                        <div class="icon-delete">
                            <a href="../content/hapus/hapus_profil.php">
                                <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="right"
                                    title="Hapus Foto" onclick="return confirm('Hapus Foto Ini?')"></i>
                            </a>
                        </div>
                        <?php } ?>

                        <div class=" input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nama" placeholder="nama lengkap" id="alpabet"
                                style="text-transform: capitalize;" value="<?= $nama_user  ?>" autocomplete="off">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" name="username"
                                value="<?= $_SESSION["username"]  ?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" name="posisi"
                                value="<?= $posisi  ?> <?= $_SESSION["cabang"] ?>" readonly>
                        </div>

                        <div class="button">
                            <input type="submit" name="input" class="btn btn-primary w-100" value="Simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>