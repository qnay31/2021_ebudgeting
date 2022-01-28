<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$key      = $_GET["key"];
$query2    = mysqli_query($conn, "SELECT * FROM akun_pengurus WHERE id = '$unik' AND password = '$key' ");
$data           = mysqli_fetch_assoc($query2);
$nama           = $data["nama"];
$posisi2        = $data["posisi"];
$profil         = $data["profil"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];

$result = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Menghapus akun $nama sebagai $posisi2')");

if ($profil == 'profil.png') {

    $query = mysqli_query($conn, "DELETE FROM `akun_pengurus` WHERE id = '$unik' AND password = '$key' ");

} else {
    
    unlink("../../img/profil/".$profil);
    unlink("../../img/profil/thump_".$profil);

    $query = mysqli_query($conn, "DELETE FROM `akun_pengurus` WHERE id = '$unik' AND password = '$key' ");
}



// die(var_dump($hapus));


// die(var_dump($query3));

if (($query == true)) {
    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_data=pengurus';
</script>";
}  else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_data=pengurus';
</script>";
}

?>