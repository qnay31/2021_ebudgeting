<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query  = mysqli_query($conn, "SELECT * FROM baksos WHERE id = '$unik' AND MONTH(tgl_pemakaian) = '$periode' ");
$data   = mysqli_fetch_assoc($query);
$program= $data["program"];
$deskripsi   = $data["deskripsi"];
$posisi_   = $data["posisi"];
$id_pengurus   = $data["id_pengurus"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");


$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];
// die(var_dump($posisi_));

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Mengkonfirmasi Laporan $program')");


$update = mysqli_query($conn, "UPDATE `baksos` SET 
            `laporan`           ='Terverifikasi'
            WHERE deskripsi = '$deskripsi' "); 

// Global
$q  = mysqli_query($conn, "SELECT * FROM baksos WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' ");

$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $convert   = convertDateDBtoIndo($r['tgl_pemakaian']);
    $bulan     = substr($convert, 3, -5);

    $d_anggaran = $r['dana_anggaran'];
    $i++;
    $total_anggaran[$i] = $d_anggaran;

    $hasil_anggaran = array_sum($total_anggaran);

    $d_terpakai = $r['dana_terpakai'];
    $total_terpakai[$i] = $d_terpakai;

    $hasil_terpakai = array_sum($total_terpakai);

    // die(var_dump($id_pengurus));

}

// cek nama
$c_query = mysqli_query($conn, "SELECT bulan FROM data_baksos WHERE bulan = '$bulan' ");


// sub cabang logistik
// logistik depok
if ($id_pengurus == 'kepala_logistik' && $posisi_ == 'Kepala Logistik') {
    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_baksos` SET 
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");
        }
        // die(var_dump($tes));
        
        // logistik_bogor
    } 

// die(var_dump($update));
if ($update !== true) {
    echo "<script>
alert('Data Tidak Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_check=global_laporan';
</script>";
} else {
echo "<script>
alert('Data Laporan Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_check=global_laporan';
</script>";
}


?>