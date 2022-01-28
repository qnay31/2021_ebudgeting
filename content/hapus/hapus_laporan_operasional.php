<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query    = mysqli_query($conn, "SELECT * FROM operasional_yayasan WHERE id = '$unik' AND MONTH(tgl_dibuat) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$nama           = $data["nama"];
$id_pengurus    = $data["id_pengurus"];
$program      = $data["kategori"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$q2    = mysqli_query($conn, "SELECT * FROM galeri_operasional WHERE nomor_id = '$unik' AND program = '$program' ");
$i = 1;
$sql2 = $q2;

while ($data2 = mysqli_fetch_array($sql2)) {
    $dokumentasi = $data2['dokumentasi'];
    $i++;
    $total_dokumentasi[$i] = $dokumentasi;
    unlink("../../img/laporan/operasional/".$total_dokumentasi[$i]);
}

// die(var_dump($hapus));
$query2 = mysqli_query($conn, "UPDATE `operasional_yayasan` SET 
`tgl_laporan`='',
`pemakaian`='',
`dana_terpakai`='',
`laporan`='Belum Laporan'

WHERE id = '$unik' ");


// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip', '$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Menghapus Laporan $program')");

$query3 = mysqli_query($conn, "DELETE FROM `galeri_operasional` WHERE nomor_id = '$unik' AND program = '$program'");

if (($query2 == true )) {

    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_taman=operasional_yayasan&id_input=laporan_logistik';
</script>";
} else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_taman=operasional_yayasan&id_input=laporan_logistik';
</script>";
}

?>