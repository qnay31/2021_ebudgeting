<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query  = mysqli_query($conn, "SELECT * FROM logistik WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
$data   = mysqli_fetch_assoc($query);
$program= $data["program"];
$deskripsi   = $data["deskripsi"];
$ip     = get_client_ip();
$date   = date("Y-m-d H:i:s");


$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];
// die(var_dump($posisi));

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Mengkonfirmasi Anggaran $program')");


$update = mysqli_query($conn, "UPDATE `logistik` SET 
            `status_b`           ='OK'
            WHERE deskripsi = '$deskripsi' "); 

// die(var_dump($update));
if ($update !== true && $_SESSION[id_pengurus] == "kepala_logistik") {
    echo "<script>
    alert('Data Tidak Berhasil Dikonfirmasi');
    document.location.href = '../user/$_SESSION[username].php?id_check=check_logistik';
    </script>";
} elseif ($update !== true && $_SESSION[id_pengurus] == "kepala_cabang") {
    echo "<script>
    alert('Data Tidak Berhasil Dikonfirmasi');
    document.location.href = '../user/$_SESSION[username].php?id_check=check_cabang';
    </script>";
} elseif ($update == true && $_SESSION[id_pengurus] == "kepala_cabang") {
    echo "<script>
    alert('Data Anggaran Berhasil Dikonfirmasi');
    document.location.href = '../user/$_SESSION[username].php?id_check=check_cabang';
    </script>";
} else {
    echo "<script>
    alert('Data Anggaran Berhasil Dikonfirmasi');
    document.location.href = '../user/$_SESSION[username].php?id_check=check_logistik';
    </script>";
}


?>