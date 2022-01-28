<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"];

$query      = mysqli_query($conn, "SELECT * FROM income WHERE id = '$unik' AND MONTH(tgl_pemasukan) = '$periode' ");
$data       = mysqli_fetch_assoc($query);
$kategori   = $data["kategori"];
$gedung     = $data["gedung"];
$posisi     = $data["posisi"];
$gedung   = $data["gedung"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip', '$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Mengkonfirmasi $kategori Gedung $gedung')");


$update = mysqli_query($conn, "UPDATE `income` SET 
            `status`           ='Terverifikasi'
            WHERE id = '$unik' "); 

// Global
$q  = mysqli_query($conn, "SELECT * FROM income WHERE MONTH(tgl_pemasukan) = '$periode' AND status = 'Terverifikasi' ");

$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $convert   = convertDateDBtoIndo($r['tgl_pemasukan']);
    $bulan     = substr($convert, 3, -5);

    $d_income = $r['income'];
    $i++;
    $total_income[$i] = $d_income;

    $hasil_income = array_sum($total_income);
}

// kesehatan depok
$q2  = mysqli_query($conn, "SELECT * FROM income WHERE MONTH(tgl_pemasukan) = '$periode' AND status = 'Terverifikasi' AND gedung = '$gedung' ");

$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{
    $d_income2 = $r2['income'];
    $i++;
    $total_income2[$i] = $d_income2;

    $hasil_income2 = array_sum($total_income2);
}



// cek nama
$c_query = mysqli_query($conn, "SELECT bulan FROM data_income_new WHERE bulan = '$bulan' ");

// sub cabang income
// pendidikan depok
if ($gedung == 'A') {
    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_income_new` SET 
            `income_a`              ='$hasil_income2',
            `income_global`         ='$hasil_income'
            WHERE bulan = '$bulan' ");
        }
        
        // pendidikan bogor
    } elseif ($gedung == 'B') {
        if (mysqli_fetch_assoc($c_query)) {
            $tes = mysqli_query($conn, "UPDATE `data_income_new` SET 
            `income_b`              ='$hasil_income2',
            `income_global`         ='$hasil_income'
            WHERE bulan = '$bulan' ");   
        }
            
        // kepala income depok
    } elseif ($gedung == 'Instagram') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_income_new` SET 
            `income_instagram`      ='$hasil_income2',
            `income_global`         ='$hasil_income'
            WHERE bulan = '$bulan' ");   
        }

        // kepala income bogor
    } elseif ($gedung == 'Bogor') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_income_new` SET 
            `income_bogor`          ='$hasil_income2',
            `income_global`         ='$hasil_income'
            WHERE bulan = '$bulan' ");   
        }
    }

// die(var_dump($update));
if ($update !== true) {
    echo "<script>
alert('Data Tidak Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_income';
</script>";
}  else {
echo "<script>
alert('Data Income Berhasil Dikonfirmasi');
document.location.href = '../user/$_SESSION[username].php?id_pemasukan=check_income';
</script>";
}


?>