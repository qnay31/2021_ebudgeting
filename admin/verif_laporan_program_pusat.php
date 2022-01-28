<?php 
session_start();

error_reporting(0);
require '../function.php';

$unik     = $_GET["id_unik"];
$periode  = $_GET["id_p"]; 
$query  = mysqli_query($conn, "SELECT * FROM program WHERE id = '$unik' AND MONTH(tgl_pemakaian) = '$periode' ");
$data   = mysqli_fetch_assoc($query);
$program= $data["program"];
$deskripsi   = $data["deskripsi"];
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

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip', '$date', '$_SESSION[nama] Divisi $posisi Telah Mengkonfirmasi Laporan $program')");


$update = mysqli_query($conn, "UPDATE `program` SET 
            `laporan`           ='Terverifikasi'
            WHERE deskripsi = '$deskripsi' "); 

// Global
$q  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' ");

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
}

// kesehatan depok
$q2  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND id_pengurus = 'program_kesehatan' AND cabang = 'Depok' ");

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

// pendidikan depok
$q3  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND id_pengurus = 'program_pendidikan' AND cabang = 'Depok' ");

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

// kesehatan Bogor
$q4  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND id_pengurus = 'program_kesehatan' AND cabang = 'Bogor' ");

$sql4 = $q4;
while($r4 = mysqli_fetch_array($sql4))
{
    $d_anggaran4 = $r4['dana_anggaran'];
    $i++;
    $total_anggaran4[$i] = $d_anggaran4;

    $hasil_anggaran4 = array_sum($total_anggaran4);

    $d_terpakai4 = $r4['dana_terpakai'];
    $total_terpakai4[$i] = $d_terpakai4;

    $hasil_terpakai4 = array_sum($total_terpakai4);
}

// pendidikan Bogor
$q5  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND id_pengurus = 'program_pendidikan' AND cabang = 'Bogor' ");

$sql5 = $q5;
while($r5 = mysqli_fetch_array($sql5))
{
    $d_anggaran5 = $r5['dana_anggaran'];
    $i++;
    $total_anggaran5[$i] = $d_anggaran5;

    $hasil_anggaran5 = array_sum($total_anggaran5);

    $d_terpakai5 = $r5['dana_terpakai'];
    $total_terpakai5[$i] = $d_terpakai5;

    $hasil_terpakai5 = array_sum($total_terpakai5);
}

// program depok
$q6  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND cabang = 'Depok' ");

$sql6 = $q6;
while($r6 = mysqli_fetch_array($sql6))
{
    $d_anggaran6 = $r6['dana_anggaran'];
    $i++;
    $total_anggaran6[$i] = $d_anggaran6;

    $hasil_anggaran6 = array_sum($total_anggaran6);

    $d_terpakai6 = $r6['dana_terpakai'];
    $total_terpakai6[$i] = $d_terpakai6;

    $hasil_terpakai6 = array_sum($total_terpakai6);
}

// program bogor
$q7  = mysqli_query($conn, "SELECT * FROM program WHERE MONTH(tgl_pemakaian) = '$periode' AND laporan = 'Terverifikasi' AND cabang = 'Bogor' ");

$sql7 = $q7;
while($r7 = mysqli_fetch_array($sql7))
{
    $d_anggaran7 = $r7['dana_anggaran'];
    $i++;
    $total_anggaran7[$i] = $d_anggaran7;
    
    $hasil_anggaran7 = array_sum($total_anggaran7);
    
    $d_terpakai7 = $r7['dana_terpakai'];
    $total_terpakai7[$i] = $d_terpakai7;
    
    $hasil_terpakai7 = array_sum($total_terpakai7);
}


// cek nama
$c_query = mysqli_query($conn, "SELECT bulan FROM data_program WHERE bulan = '$bulan' ");

// sub cabang program
// pendidikan depok
if ($id_pengurus == 'program_pendidikan' && $cabang == 'Depok') {
    if (mysqli_fetch_assoc($c_query)) {
        $tes = mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_pendidikan`           ='$hasil_anggaran3',
            `terpakai_pendidikan`           ='$hasil_terpakai3',
            `anggaran_program_depok`        ='$hasil_anggaran6',
            `terpakai_program_depok`        ='$hasil_terpakai6',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");
        }

        // die(var_dump($c_query));
        // kesehatan depok
    } elseif ($id_pengurus == 'program_kesehatan' && $cabang == 'Depok') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_kesehatan`           ='$hasil_anggaran2',
            `terpakai_kesehatan`           ='$hasil_terpakai2',
            `anggaran_program_depok`        ='$hasil_anggaran6',
            `terpakai_program_depok`        ='$hasil_terpakai6',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }
        
        // pendidikan bogor
    } elseif ($id_pengurus == 'program_pendidikan' && $cabang == 'Bogor') {
        if (mysqli_fetch_assoc($c_query)) {
            $tes = mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_pendidikan_bogor`      ='$hasil_anggaran5',
            `terpakai_pendidikan_bogor`      ='$hasil_terpakai5',
            `anggaran_program_bogor`        ='$hasil_anggaran7',
            `terpakai_program_bogor`        ='$hasil_terpakai7',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }
        
        // kesehatan bogor 
    } elseif ($id_pengurus == 'program_kesehatan' && $cabang == 'Bogor') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_kesehatan_bogor`      ='$hasil_anggaran4',
            `terpakai_kesehatan_bogor`      ='$hasil_terpakai4',
            `anggaran_program_bogor`        ='$hasil_anggaran7',
            `terpakai_program_bogor`        ='$hasil_terpakai7',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }
        
        // kepala program depok
    } elseif ($id_pengurus == 'kepala_program' && $cabang == 'Depok') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_program_depok`        ='$hasil_anggaran6',
            `terpakai_program_depok`        ='$hasil_terpakai6',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }

        // kepala program bogor
    } elseif ($id_pengurus == 'kepala_program' && $cabang == 'Bogor') {
        if (mysqli_fetch_assoc($c_query)) {
            mysqli_query($conn, "UPDATE `data_program` SET 
            `anggaran_program_bogor`        ='$hasil_anggaran7',
            `terpakai_program_bogor`        ='$hasil_terpakai7',
            `anggaran_global`               ='$hasil_anggaran',
            `terpakai_global`               ='$hasil_terpakai'
            WHERE bulan = '$bulan' ");   
        }
    }

    
    

// die(var_dump($update));
if ($update == false ) {
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