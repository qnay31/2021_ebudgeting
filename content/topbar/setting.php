<?php
if (isset($_POST["ubah_user"]) ) {
    if(setting_username($_POST) > 0 ) {
        echo "<script>
                alert('Username berhasil diganti, Harap Re - Login Kembali');
                document.location.href = '../index.php';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_topbar=setting"> <small
                                class="text-white">Username&nbsp;
                            </small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_topbar=set_pw"></i><small>Password&nbsp;</small></a>
                    </li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Ubah Username :</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_user(this)" class="user">
                            <div class="mb-3">
                                <div class="form-text mb-2">
                                    Nama Lengkap
                                </div>
                                <input type="text" class="form-control" name="nama" value="<?= $_SESSION["nama"] ?>"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <div class="form-text mb-2">
                                    Username
                                </div>
                                <input type="text" class="form-control" name="username"
                                    value="<?= $_SESSION["username"] ?>" maxlength='20' id="alpabet_user">
                            </div>

                            <div class="button">
                                <input type="submit" name="ubah_user" class="btn btn-primary w-100"
                                    value="Ubah Username">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>