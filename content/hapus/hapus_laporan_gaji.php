<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query    = mysqli_query($conn, "SELECT * FROM gaji_karyawan WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$nama           = $data["nama"];
$id_pengurus    = $data["id_pengurus"];
$program      = $data["kategori"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];

// die(var_dump($hapus));
$query2 = mysqli_query($conn, "UPDATE `gaji_karyawan` SET 
`tgl_laporan`='',
`pemakaian`='',
`dana_terpakai`='',
`laporan`='Belum Laporan'

WHERE id = '$unik' ");


// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Menghapus Laporan $program')");

if (($query2 == true )) {

    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_input=laporan_logistik&id_management=gaji';
</script>";
} else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_input=laporan_logistik&id_management=gaji';
</script>";
}

?>