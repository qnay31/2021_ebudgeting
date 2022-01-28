<?php 
session_start();

require '../../function.php';


$query    = mysqli_query($conn, "SELECT * FROM akun_pengurus WHERE username = '$_SESSION[username]' ");

$data           = mysqli_fetch_assoc($query);
$username       = $data["username"];
$profil         = $data["profil"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];

unlink("../../img/profil/".$profil);
unlink("../../img/profil/thump_".$profil);

$update = mysqli_query($conn, "UPDATE `akun_pengurus` SET
`profil` ='profil.png'
WHERE username = '$username' ");

// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Menghapus Foto Profilnya')");

if (($update ==  true)) {
    echo "<script>
alert('Foto Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_topbar=profil';
</script>";
}  else {
echo "<script>
alert('Foto Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_topbar=profil';
</script>";
}

?>