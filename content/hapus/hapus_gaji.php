<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$key      = $_GET["id"]; 
$query    = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$kategori       = $data["kategori"];
$nama           = $data["nama"];
$gedung         = $data["gedung"];
$id_pengurus    = $data["id_pengurus"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

// die(var_dump($hapus));
$query2 = mysqli_query($conn, "DELETE FROM `gaji_karyawan` WHERE id = '$unik' AND kategori = '$kategori' AND MONTH(tgl_dibuat) = '$periode' ");

// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip', '$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Menghapus $kategori')");

if (($query2 == true)) {
    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_input=$key';
</script>";
}  else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_input=$key';
</script>";
}

?>