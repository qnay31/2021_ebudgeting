<?php
if(isset($_POST['ubah_password']) ){
    //membuat variabel untuk menyimpan data inputan yang di isikan di form
    $password_lama      = $_POST['password_lama'];
    $password_baru      = $_POST['password_baru'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];
    
    //cek dahulu ke database dengan query SELECT
    //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
    //encrypt -> md5($password_lama)

    $password_lama2  = password_verify($password_lama, $_SESSION["password"]);
    // die(var_dump($password_lama2));

    if($password_lama2 === TRUE){

        if($password_baru === $konfirmasi_password){

        $password_baru  = password_hash($password_baru, PASSWORD_DEFAULT);
          $id_user    = $_SESSION['id']; //ini dari session saat login
          // die(var_dump($password_lama));

        $update     = $conn->query("UPDATE akun_pengurus SET password ='$password_baru' WHERE id ='$id_user'");
        if($update){
            //kondisi jika proses query UPDATE berhasil
            echo "<script>
                    alert('Password Sudah Berhasil Diperbarui');
                </script>";
        }         
        }else{
      //kondisi jika password lama tidak cocok dengan data yang ada di database
    echo "<script>
            alert('Konfirmasi Password Tidak Sama');
            </script>";
    }
    }else{
      //kondisi jika password lama tidak cocok dengan data yang ada di database
    echo "<script>
            alert('Password Lama Yang Kamu Masukkan Salah');
            </script>";
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
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_topbar=setting"> <small>Username&nbsp;
                            </small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_topbar=set_pw"></i><small
                                class="text-white">Password&nbsp;</small></a>
                    </li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Ubah Password :</b>
                        <hr>
                    </label>
                    <div id="form">
                        <form action="" method="post" onsubmit="return validasi_ubahpw(this)" name="ubah_pw"
                            class="user">
                            <label for="" class="form-label">Password Lama</label>
                            <div class="form-group pw">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash toggle-password"
                                    maxlength='20'></span>
                                <input type="password" class="form-control form-control-user" name="password_lama"
                                    id="password-field" placeholder="Password" aria-label="Password"
                                    aria-describedby="basic-addon1">
                            </div>

                            <label for="password-field2" class="form-label">Password Baru <span id="asalbagus">(Sisa
                                    Karakter :
                                    20/20)</span></label>

                            <div class="form-group pw">
                                <span toggle="#password-field2" class="fa fa-fw fa-eye-slash toggle-password"
                                    maxlength='20'></span>
                                <input type="password" class="form-control form-control-user" name="password_baru"
                                    id="password-field2" placeholder="Password Baru" aria-label="Password"
                                    aria-describedby="basic-addon1" onKeyUp='Hitung()' maxlength='20'>
                            </div>

                            <label for="password-field3" class="form-label">Konfirmasi Password <span
                                    id="asalbagus2">(Sisa
                                    Karakter : 20/20)</span></label>
                            <div class="form-group pw">
                                <span toggle="#password-field3" class="fa fa-fw fa-eye-slash toggle-password"
                                    maxlength='20'></span>
                                <input type="password" class="form-control form-control-user" name="konfirmasi_password"
                                    id="password-field3" placeholder="Konfirmasi Password" aria-label="Password"
                                    aria-describedby="basic-addon1" onKeyUp='Hitung2()' maxlength='20'>
                            </div>

                            <div class="button">
                                <input type="submit" name="ubah_password" class="btn btn-primary w-100"
                                    value="Ubah Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>