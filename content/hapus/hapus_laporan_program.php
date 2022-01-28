<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query    = mysqli_query($conn, "SELECT * FROM program WHERE id = '$unik' AND MONTH(tgl_pengajuan) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$nama           = $data["nama"];
$id_pengurus    = $data["id_pengurus"];
$program      = $data["program"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$q2    = mysqli_query($conn, "SELECT * FROM galeri_program WHERE nomor_id = '$unik' AND program = '$program' ");
$i = 1;
$sql2 = $q2;

while ($data2 = mysqli_fetch_array($sql2)) {
    $dokumentasi = $data2['dokumentasi'];
    $i++;
    $total_dokumentasi[$i] = $dokumentasi;
    unlink("../../img/laporan/program/".$total_dokumentasi[$i]);
}

$kueri = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, list_divisi.posisi 
FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$posisi = $has_kueri["posisi"];

// die(var_dump($q2));
$query2 = mysqli_query($conn, "UPDATE `program` SET 
`tgl_pemakaian`='',
`deskripsi_pemakaian`='',
`dana_terpakai`='',
`laporan`='Belum Laporan'

WHERE id = '$unik' AND program = '$program' ");



$query3 = mysqli_query($conn, "DELETE FROM `galeri_program` WHERE nomor_id = '$unik' AND program = '$program'");

// die(var_dump($query3));
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Menghapus Laporan $program')");

if ($query2 !== true && $_SESSION[id_pengurus] == "kepala_program") {
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href = '../../user/$_SESSION[username].php?id_check=verif_laporan';
    </script>";
} elseif ($query2 !== true && $_SESSION[id_pengurus] == "kepala_cabang") {
    echo "<script>
    alert('Data Tidak Berhasil Dihapus');
    document.location.href = '../../user/$_SESSION[username].php?id_check=cabang_laporan';
    </script>";
} elseif ($query2 == true && $_SESSION[id_pengurus] == "kepala_cabang") {
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href = '../../user/$_SESSION[username].php?id_check=cabang_laporan';
    </script>";
} else {
    echo "<script>
    alert('Data Tidak Berhasil Dihapus');
    document.location.href = '../../user/$_SESSION[username].php?id_check=verif_laporan';
    </script>";
}

?>