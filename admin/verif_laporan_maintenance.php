<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query  = mysqli_query($conn, "SELECT * FROM maintenance WHERE id = '$unik' AND MONTH(tgl_pemakaian) = '$periode' ");
$data   = mysqli_fetch_assoc($query);
$program= $data["kategori"];
$maintenance= $data["maintenance"];
$cabang   = $data["cabang"];
$id_pengurus   = $data["id_pengurus"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");


$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];
// die(var_dump($posisi));

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Mengkonfirmasi Laporan $program $maintenance')");


$update = mysqli_query($conn, "UPDATE `maintenance` SET 
            `laporan`           ='Terverifikasi'
            WHERE id = '$unik' "); 

// Global
$q  = mysqli_query($conn, "SELECT * FROM maintenance WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' ");

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

// maintenance aset
$q2  = mysqli_query($conn, "SELECT * FROM maintenance WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND maintenance = 'Aset' ");

$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{
    $d_anggaran2 = $r2['dana_anggaran'];
    $i++;
    $total_anggaran2[$i] = $d_anggaran2;

    $hasil_anggaran2 = array_sum($total_anggaran2);

    $d_terpakai2 = $r2['dana_terpakai'];
    $total_terpakai2[$i] = $d_terpakai2;

    $hasil_terpakai2 = array_sum($total_terpakai2);
}

// maintenance gedung
$q3  = mysqli_query($conn, "SELECT * FROM maintenance WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND maintenance = 'Gedung' ");

$sql3 = $q3;
while($r3 = mysqli_fetch_array($sql3))
{
    $d_anggaran3 = $r3['dana_anggaran'];
    $i++;
    $total_anggaran3[$i] = $d_anggaran3;
    
    $hasil_anggaran3 = array_sum($total_anggaran3);
    
    $d_terpakai3 = $r3['dana_terpakai'];
    $total_terpakai3[$i] = $d_terpakai3;
    
    $hasil_terpakai3 = array_sum($total_terpakai3);
}

// cek nama
$c_query = mysqli_query($conn, "SELECT bulan FROM data_maintenance WHERE bulan = '$bulan' ");

if ($id_pengurus == 'kepala_logistik' && $maintenance == 'Aset') {
    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_maintenance` SET 
            `anggaran_maintenance_aset`     ='$hasil_anggaran2',
            `terpakai_maintenance_aset`     ='$hasil_terpakai2',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");
        }
        
        // logistik_bogor
    } elseif ($id_pengurus == 'kepala_logistik' && $maintenance == 'Gedung') {
        if (mysqli_fetch_assoc($c_query)) {
            $tes2 = mysqli_query($conn, "UPDATE `data_maintenance` SET 
            `anggaran_maintenance_gedung`   ='$hasil_anggaran3',
            `terpakai_maintenance_gedung`   ='$hasil_terpakai3',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }
        
        // die(var_dump($tes2));
    } 

// die(var_dump($update));
if ($update !== true) {
    echo "<script>
alert('Data Tidak Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_laporan=check_maintenance';
</script>";
} else {
echo "<script>
alert('Data Laporan Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_laporan=check_maintenance';
</script>";
}


?>