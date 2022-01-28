<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"];

$query      = mysqli_query($conn, "SELECT * FROM cashback WHERE id = '$unik' AND MONTH(tgl_cashback) = '$periode' ");
$data       = mysqli_fetch_assoc($query);
$kategori   = $data["kategori"];
$deskripsi   = $data["deskripsi"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip', '$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Mengkonfirmasi dana $deskripsi')");


$update = mysqli_query($conn, "UPDATE `cashback` SET 
            `status`           ='Terverifikasi'
            WHERE id = '$unik' "); 

// Global
$q  = mysqli_query($conn, "SELECT * FROM cashback WHERE MONTH(tgl_cashback) = '$periode' AND status = 'Terverifikasi' ");

$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $convert   = convertDateDBtoIndo($r['tgl_cashback']);
    $bulan     = substr($convert, 3, -5);

    $d_cashback = $r['cashback'];
    $i++;
    $total_cashback[$i] = $d_cashback;

    $hasil_cashback = array_sum($total_cashback);
}

// cek nama
$c_query = mysqli_query($conn, "SELECT bulan FROM data_cashback WHERE bulan = '$bulan' ");

    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_cashback` SET 
            `cashback_global`         ='$hasil_cashback'
            WHERE bulan = '$bulan' ");
        }
        
// die(var_dump($update));
if ($update !== true) {
    echo "<script>
alert('Data Tidak Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_cashback';
</script>";
}  else {
echo "<script>
alert('Data cashback Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_cashback';
</script>";
}


?>