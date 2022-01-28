<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"];

$query  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE id = '$unik' AND MONTH(tgl_ambil) = '$periode' ");
$data   = mysqli_fetch_assoc($query);
$kategori= $data["kategori"];
$posisi   = $data["posisi"];
$id_pengurus   = $data["id_pengurus"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Mengkonfirmasi Income $kategori')");


$update = mysqli_query($conn, "UPDATE `pemasukan` SET 
            `status`           ='Terverifikasi'
            WHERE id = '$unik' "); 

// celengan
$q  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE MONTH(tgl_ambil) = '$periode' AND kategori = 'celengan' AND status = 'Terverifikasi' ");

$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $convert   = convertDateDBtoIndo($r['tgl_ambil']);
    $bulan     = substr($convert, 3, -5);

    $d_pemasukan = $r['income'];
    $i++;
    $total_pemasukan[$i] = $d_pemasukan;

    $hasil_pemasukan = array_sum($total_pemasukan);
    // die(var_dump($bulan));

}

// kotak amal
$q2  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE MONTH(tgl_ambil) = '$periode' AND kategori = 'kotak amal' AND status = 'Terverifikasi' ");

$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{
    $convert2   = convertDateDBtoIndo($r2['tgl_ambil']);
    $bulan2     = substr($convert2, 3, -5);
    $d_pemasukan2 = $r2['income'];
    $i++;
    $total_pemasukan2[$i] = $d_pemasukan2;

    $hasil_pemasukan2 = array_sum($total_pemasukan2);
}

// cek nama
if ($kategori == 'celengan') {
    $c_query = mysqli_query($conn, "SELECT bulan FROM data_pemasukan WHERE bulan = '$bulan' ");
} else {
    $c_query = mysqli_query($conn, "SELECT bulan FROM data_pemasukan WHERE bulan = '$bulan2' ");
}
// sub cabang logistik
// logistik depok
if ($id_pengurus == 'kepala_humas' && $kategori == 'celengan') {
    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_pemasukan` SET 
            `pemasukan_celengan`     ='$hasil_pemasukan'
            WHERE bulan = '$bulan' ");
        }
        // die(var_dump($tes));
        
        // kotak amal
    } elseif ($id_pengurus == 'kepala_humas' && $kategori == 'kotak amal') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_pemasukan` SET 
            `pemasukan_kotak_amal`      ='$hasil_pemasukan2'
            WHERE bulan = '$bulan2' ");   
        }
    }

// die(var_dump($update));
if ($update !== true) {
    echo "<script>
alert('Data Tidak Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_check=global_laporan';
</script>";
} elseif ($update == true && $kategori == 'celengan') {
    echo "<script>
alert('Data Income Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_celengan';
</script>";

} elseif ($update == true && $kategori == 'kotak amal') {
    echo "<script>
    alert('Data Income Berhasil Dikonfirmasi');
    document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_kotak';
    </script>";
} else {
echo "<script>
alert('Data Income Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_celengan';
</script>";
}


?>