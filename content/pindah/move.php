<?php 
session_start();

error_reporting(0);
require '../../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query    = mysqli_query($conn, "SELECT * FROM program WHERE id = '$unik' AND MONTH(tgl_pemakaian) = '$periode' ");
$data           = mysqli_fetch_assoc($query);
$program       = $data["program"];
$nama           = $data["nama"];
$cabang           = $data["cabang"];
$id_pengurus    = $data["id_pengurus"];
$ip             = get_client_ip();
$date           = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "INSERT INTO operasional_yayasan VALUES('', 'logistik', 'Operasional Yayasan', '$data[cabang]',
'Pimpi Ayu Nuraini', 'Logistik Gedung Taman', '$data[tgl_pengajuan]', '$data[deskripsi]', '$data[dana_anggaran]', '$data[tgl_pemakaian]', '$data[deskripsi_pemakaian]', '$data[dana_terpakai]', '$data[status]', '$data[laporan]')");    

// die(var_dump($update));

$q2    = mysqli_query($conn, "SELECT * FROM galeri_program WHERE nomor_id = '$unik' AND program = '$program' ");
$i = 1;
$sql2 = $q2;

while ($data2 = mysqli_fetch_array($sql2)) {
    $dokumentasi = $data2['dokumentasi'];
    $i++;
    $total_dokumentasi[$i] = $dokumentasi;
    
    $result2 = mysqli_query($conn, "INSERT INTO galeri_operasional VALUES('', '$unik', 'logistik', 'Operasional Yayasan', 'Pimpi Ayu Nuraini',
    '$total_dokumentasi[$i]')");

    $moved = rename("../../img/laporan/program/".$total_dokumentasi[$i], "../../img/laporan/operasional/".$total_dokumentasi[$i]);
    if($moved){
        unlink("../../img/laporan/program/".$total_dokumentasi[$i]);
      }
    //   die(var_dump($data2));
}
// die(var_dump($move));

$query2 = mysqli_query($conn, "DELETE FROM `program` WHERE id = '$unik' AND kategori = '$kategori' AND MONTH(tgl_pemakaian) = '$periode' ");


if (($result2 == true && $query2 == true)) {
    echo "<script>
alert('Data Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_link_admin=program&id_admin_ubah=ubah_program';
</script>";
}  else {
echo "<script>
alert('Data Tidak Berhasil Dihapus');
document.location.href = '../../user/$_SESSION[username].php?id_link_admin=program&id_admin_ubah=ubah_program';
</script>";
}

?>