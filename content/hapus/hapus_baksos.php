<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query    = mysqli_query($conn, "SELECT * FROM baksos WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$program       = $data["program"];
$nama           = $data["nama"];
$id_pengurus    = $data["id_pengurus"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

// die(var_dump($hapus));
$query2 = mysqli_query($conn, "DELETE FROM `baksos` WHERE id = '$unik' AND program = '$program' AND MONTH(tgl_pengajuan) = '$periode' ");

// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip', '$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Menghapus Anggaran $program')");

if (($query2 == true)) {
    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_link_logistik=baksos&id_input=verifikasi_baksos';
</script>";
}  else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_link_logistik=baksos&id_input=verifikasi_baksos';
</script>";
}

?>