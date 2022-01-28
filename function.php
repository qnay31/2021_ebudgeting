<?php

date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect("localhost", "root", "", "edaily_v2");

// ip
function get_client_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function convertDateDBtoIndo($string)
{
	// contoh : 2019-01-30

	$bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

	$tanggal 	= explode("-", $string)[2];
	$bulan 		= explode("-", $string)[1];
	$tahun 		= explode("-", $string)[0];

	return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
}

function RemoveSpecialChar($nom_acak)
{

	// Using str_replace() function 
	// to replace the word 
	$res = str_replace(array("#", "."), ' ', $nom_acak);


	// Returning the result 
	return $res;
}

function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 225;
    $resizeHeight = 225;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

function upload() {
	$file 		= $_FILES['gambar']['name'];
	$ukuran 	= $_FILES['gambar']['size'];
	$error 		= $_FILES['gambar']['error'];
	$tmpName 	= $_FILES['gambar']['tmp_name'];

	$uploadPath = '../img/profil/';

	
	// cek gambat

	if ($error === 4) {
		return false;
	}

	// cek gambar/bukan
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $file); 
	$ekstensigambar = strtolower(end($ekstensigambar));

	if (!in_array($ekstensigambar, $ekstensigambarvalid) ) {
		echo "<script>

		alert('yang di upload bukan gambar');

			</script>";
			return false;
		
	}

	// cek ukuran terlalu bessar
	if ($ukuran>10000000) {
		echo "<script>

		alert('ukuran terlalu besar');

			</script>";
			return false;
		
	}

	$sourceProperties = getimagesize($tmpName);
	$uploadImageType = $sourceProperties[2];
	$sourceImageWidth = $sourceProperties[0];
	$sourceImageHeight = $sourceProperties[1];

	// generate nama batu gambar
	$namagambarbaru = uniqid();
	$namagambarbaru .='.';
	$namagambarbaru .= $ekstensigambar;

	switch ($uploadImageType) {
		case IMAGETYPE_JPEG:
			$resourceType = imagecreatefromjpeg($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagejpeg($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;

		case IMAGETYPE_JPG:
			$resourceType = imagecreatefromjpg($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagejpg($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;

		case IMAGETYPE_PNG:
			$resourceType = imagecreatefrompng($tmpName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagepng($imageLayer,$uploadPath."thump_".$namagambarbaru);
			break;
	}
	
	// die(var_dump($sourceImageHeight));

	 // siap di upload
	move_uploaded_file($tmpName,  $uploadPath . $namagambarbaru);
	

	return $namagambarbaru;

}

function input_pengurus($data)
{
	global $conn;

	$ambil_nama     = htmlspecialchars($data["nama"]);
	$nama     		= ucwords($data["nama"]);
	$id_pengurus    = $data["divisi"];
	$cabang    		= $data["cabang"];
	$posisi    		= $data["posisi"];
	$username     	= htmlspecialchars($data["username"]);
	$password		= mysqli_real_escape_string($conn, $data["password"]);
	$password2		= mysqli_real_escape_string($conn, $data["password2"]);
	$ip     		= get_client_ip();
	$date   		= date("Y-m-d H:i:s");
	$pukul   		= date("H:i:s");

	// die(var_dump($anggaran));

	// cek nama
	$query = mysqli_query($conn, "SELECT nama FROM akun_pengurus WHERE nama = '$nama' ");

	if (mysqli_fetch_assoc($query)) {

		echo "<script>
			alert('Nama Sudah Terdaftar');
		</script>";

		return false;
	}

	// cek nama
	$query3 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_cabang') {
		if (mysqli_fetch_assoc($query3)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query4 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_program') {
		if (mysqli_fetch_assoc($query4)) {

			if (mysqli_fetch_assoc($query4) > 2) {

				echo "<script>
					alert('Posisi Sudah Terdaftar');
				</script>";

				return false;
			}
		}
	}

	$query5 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_logistik') {
		if (mysqli_fetch_assoc($query5)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query6 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'program_kesehatan') {
		if (mysqli_fetch_assoc($query6)) {

			if (mysqli_fetch_assoc($query6) > 2) {

				echo "<script>
					alert('Posisi Sudah Terdaftar');
				</script>";

				return false;
			}
		}
	}

	$query7 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'program_pendidikan') {
		if (mysqli_fetch_assoc($query7)) {

			if (mysqli_fetch_assoc($query7) > 2) {

				echo "<script>
					alert('Posisi Sudah Terdaftar');
				</script>";

				return false;
			}
		}
	}

	$query13 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_produksi') {
		if (mysqli_fetch_assoc($query13)) {

			if (mysqli_fetch_assoc($query13) > 2) {

				echo "<script>
					alert('Posisi Sudah Terdaftar');
				</script>";

				return false;
			}
		}
	}

	$query8 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_sekolah') {
		if (mysqli_fetch_assoc($query8)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query9 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_penjemput') {
		if (mysqli_fetch_assoc($query9)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query10 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'ketua_yayasan') {
		if (mysqli_fetch_assoc($query10)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query11 = mysqli_query($conn, "SELECT id_pengurus FROM akun_pengurus WHERE id_pengurus = '$id_pengurus' ");

	if ($id_pengurus == 'kepala_humas') {
		if (mysqli_fetch_assoc($query11)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}

	$query12 = mysqli_query($conn, "SELECT posisi FROM akun_pengurus WHERE posisi = '$posisi' ");

	if ($id_pengurus == 'logistik') {
		if (mysqli_fetch_assoc($query12)) {

			echo "<script>
				alert('Posisi Sudah Terdaftar');
			</script>";

			return false;
		}
	}


	// cek username
	$query2 = mysqli_query($conn, "SELECT username FROM akun_pengurus WHERE username = '$username' ");

	if (mysqli_fetch_assoc($query2)) {

		echo "<script>
			alert('Username Sudah Terdaftar');
		</script>";

		return false;
	}

	// cek password
	if ($password !== $password2) {

		echo "<script>
			alert('Konfirmasi Password Tidak Sama');
		</script>";

		return false;
	}

	// enkripsi Password 

	$passwor_enc = password_hash($password, PASSWORD_DEFAULT);

	// link pengurus
	$halaman        = "<?php include '../badan_web/home.php' ?>";
$link_pengurus = $username . ".php";

$file = fopen("user/" . $link_pengurus, "w");
echo fwrite($file, $halaman);

// die(var_dump($file));

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$posisi', '$ip',
'$date', '$nama Telah Membuat Akun Baru $posisi')");
// input data ke database
$result = mysqli_query($conn, "INSERT INTO akun_pengurus VALUES('', '$id_pengurus', '$nama', '$cabang', '$username',
'$passwor_enc', 'profil.png', '$posisi')");

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// anggaran program
function anggaran_program($data)
{
global $conn;

$link = $data["link"];
$cabang = $data["cabang"];
$posisi = $data["posisi"];
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// die(var_dump($program));
// cek deskripsi
$query = mysqli_query($conn, "SELECT deskripsi FROM program WHERE deskripsi = '$deskripsi' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Program Sudah Pernah Di Input');
</script>";

return false;
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] Divisi $program Telah Menginput Anggaran $program')");


$result = mysqli_query($conn, "INSERT INTO program VALUES('', '$link', '$_SESSION[nama]', '$cabang', '$program',
'$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Pending', 'Belum Laporan')");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// laporan program
function laporan_program($data)
{
global $conn;

$link = $data["link"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

// die(var_dump($gambar));
$query = mysqli_query($conn, "SELECT deskripsi_pemakaian FROM program WHERE deskripsi_pemakaian = '$deskripsi_laporan'
");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Program Sudah Pernah Di Input');
</script>";

return false;
}


$update = mysqli_query($conn, "UPDATE `program` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Konfirmasi'
WHERE deskripsi = '$deskripsi' ");
// die(var_dump($update));

$query = mysqli_query($conn, "SELECT id FROM program WHERE deskripsi = '$deskripsi' ");
$hasil = mysqli_fetch_assoc($query);
$id_hasil = $hasil["id"];

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/program/';
$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];
$uploadOk = 1;

$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 20MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database
// die(var_dump($namagambarbaru));

$move = move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_program VALUES('', '$id_hasil', '$link', '$program',
'$_SESSION[nama]',
'$namagambarbaru')");
// die(var_dump($result));
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit_anggaran
function edit_anggaran_program($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = htmlspecialchars($data["tanggal"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Anggaran Program $program')");

// die(var_dump($program));

// update_target
$update = mysqli_query($conn, "UPDATE `program` SET
`program` ='$program',
`tgl_pengajuan` ='$tanggal',
`deskripsi`= '$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");


// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// edit_laporan
function edit_laporan_program($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `program` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

function setting_username($data)
{
global $conn;

$nama = htmlspecialchars($data["nama"]);
$username = htmlspecialchars($data["username"]);

$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.nama =
'$nama' ");
$r = mysqli_fetch_array($q);

// cek nama
$query = mysqli_query($conn, "SELECT username FROM akun_pengurus WHERE username = '$username' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Username masih sama');
</script>";

return false;
}

$fileAwal = "../user/" . $_SESSION['username'] . ".php";
$fileBaru = "../user/" . $username . ".php";

$nama_baru = rename($fileAwal, $fileBaru);

// die(var_dump($fileBaru));

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Mengganti Usernamenya')");

// update_target
$update = mysqli_query($conn, "UPDATE `akun_pengurus` SET
`username` ='$username'
WHERE nama = '$nama' ");



// die(var_dump($result));
return mysqli_affected_rows($conn);
}


// anggaran Logistik
function anggaran_logistik($data)
{
global $conn;

$link = $data["link"];
$cabang = $data["cabang"];
$posisi = $data["posisi"];
$g_cabang = $data["g_cabang"];
$logistik = htmlspecialchars($data["program"]);
$jenis = htmlspecialchars($data["jenis"]);
$qty = htmlspecialchars($data["qty"]);
$tanggal = $data["tanggal"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// die(var_dump($program));
// cek deskripsi
if ($logistik == 'Gaji Karyawan') {
} elseif ($logistik == 'Aset Yayasan') {
} elseif ($logistik == 'Operasional Yayasan') {
} elseif ($logistik == 'Anggaran Lainnya') {
} else {
$query = mysqli_query($conn, "SELECT deskripsi FROM logistik WHERE deskripsi = '$deskripsi' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Logistik Sudah Pernah Di Input');
</script>";

return false;
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Menginput Anggaran $logistik')");


if ($logistik == 'Gaji Karyawan') {
$result = mysqli_query($conn, "INSERT INTO gaji_karyawan VALUES('', '$link', '$logistik', '$g_cabang',
'$_SESSION[nama]', '$posisi', '$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Belum Laporan')");

} elseif ($logistik == 'Aset Yayasan') {
$result = mysqli_query($conn, "INSERT INTO aset_yayasan VALUES('', '$link', '$logistik', '$cabang', '$jenis',
'$_SESSION[nama]', '$posisi', '$tanggal', '$deskripsi', '
$qty', $anggaran, '', '', '', '', 'Pending', 'Belum Laporan')");

} elseif ($logistik == 'Operasional Yayasan') {
$result = mysqli_query($conn, "INSERT INTO operasional_yayasan VALUES('', '$link', '$logistik', '$cabang',
'$_SESSION[nama]', '$posisi', '$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Belum Laporan')");

} elseif ($logistik == 'Anggaran Lainnya') {
$result = mysqli_query($conn, "INSERT INTO anggaran_lain VALUES('', '$link', '$logistik', '$cabang',
'$_SESSION[nama]', '$posisi', '$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Belum Laporan')");

} else {
$result = mysqli_query($conn, "INSERT INTO logistik VALUES('', '$link', '$_SESSION[nama]', '$cabang', '$logistik',
'$tanggal', '$deskripsi', '$anggaran', '', '', '', 'Pending', 'Pending', 'Belum Laporan')");
}

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// edit_logistik
function edit_anggaran_logistik($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = htmlspecialchars($data["tanggal"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Anggaran $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `logistik` SET
`tgl_pengajuan` ='$tanggal',
`deskripsi`= '$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// laporan logistik
function laporan_logistik($data)
{
global $conn;

$link = $data["link"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

// die(var_dump($gambar));
$query = mysqli_query($conn, "SELECT deskripsi_pemakaian FROM logistik WHERE deskripsi_pemakaian = '$deskripsi_laporan'
");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Logistik Sudah Pernah Di Input');
</script>";

return false;
}

$update = mysqli_query($conn, "UPDATE `logistik` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Konfirmasi'
WHERE deskripsi = '$deskripsi' ");
// die(var_dump($update));

$query = mysqli_query($conn, "SELECT id FROM logistik WHERE deskripsi = '$deskripsi' ");
$hasil = mysqli_fetch_assoc($query);
$id_hasil = $hasil["id"];

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/logistik/';
$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_logistik VALUES('', '$id_hasil', '$link', '$program',
'$_SESSION[nama]',
'$namagambarbaru')");
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// laporan gaji
function laporan_gaji($data)
{
global $conn;

$link = $data["link"];
$id = htmlspecialchars($data["id"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

$update = mysqli_query($conn, "UPDATE `gaji_karyawan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id' ");
// die(var_dump($update));

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi] Management', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Management Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit_laporan
function edit_laporan_logistik($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `logistik` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// edit laporan gaji
function edit_laporan_gaji($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `gaji_karyawan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// anggaran humas
function anggaran_humas($data)
{
global $conn;

$link = $data["link"];
$cabang = $data["cabang"];
$posisi = $data["posisi"];
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// die(var_dump($program));
// cek deskripsi
$query = mysqli_query($conn, "SELECT deskripsi FROM humas WHERE deskripsi = '$deskripsi' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Ini Sudah Pernah Diinput');
</script>";

return false;
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] Divisi $posisi Telah Menginput Anggaran $program')");


$result = mysqli_query($conn, "INSERT INTO humas VALUES('', '$link', '$_SESSION[nama]', '$cabang', '$program',
'$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'OK', 'Belum Laporan')");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// edit_humas
function edit_anggaran_humas($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = htmlspecialchars($data["tanggal"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Anggaran $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `humas` SET
`tgl_pengajuan` ='$tanggal',
`deskripsi`= '$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// laporan humas
function laporan_humas($data)
{
global $conn;

$link = $data["link"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

// die(var_dump($gambar));
$query = mysqli_query($conn, "SELECT deskripsi_pemakaian FROM humas WHERE deskripsi_pemakaian = '$deskripsi_laporan'
");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Humas Sudah Pernah Di Input');
</script>";

return false;
}


$update = mysqli_query($conn, "UPDATE `humas` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE deskripsi = '$deskripsi' ");
// die(var_dump($update));

$query = mysqli_query($conn, "SELECT id FROM humas WHERE deskripsi = '$deskripsi' ");
$hasil = mysqli_fetch_assoc($query);
$id_hasil = $hasil["id"];

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/humas/';
$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_humas VALUES('', '$id_hasil', '$link', '$program', '$_SESSION[nama]',
'$namagambarbaru')");
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit_humas
function edit_laporan_humas($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `humas` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// anggaran kepala logistik
function anggaran_kepala_logistik($data)
{
global $conn;

$link = $data["link"];
$posisi = $data["posisi"];
$program = htmlspecialchars($data["program"]);
$jenis = htmlspecialchars($data["jenis"]);
$cabang = htmlspecialchars($data["cabang"]);
$tanggal = $data["tanggal"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// die(var_dump($program));
// cek deskripsi
if ($program == 'Bakti Sosial') {
$query = mysqli_query($conn, "SELECT deskripsi FROM baksos WHERE deskripsi = '$deskripsi' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Ini Sudah Pernah Diinput');
</script>";

return false;
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] Divisi $posisi Telah Menginput Anggaran $program')");

if ($link == 'kepala_produksi') {
$result = mysqli_query($conn, "INSERT INTO produksi VALUES('', '$link', '$_SESSION[nama]', '$posisi',
'$program', '$cabang', 'Pembelian', '$tanggal', '$deskripsi', '$anggaran', '', '', '',
'Pending', 'Belum Laporan')");

} elseif ($program == 'Bakti Sosial') {
$result = mysqli_query($conn, "INSERT INTO baksos VALUES('', '$link', '$_SESSION[nama]', '$posisi', '$program',
'$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Belum Laporan')");
} else {

$result = mysqli_query($conn, "INSERT INTO maintenance VALUES('', '$link', '$_SESSION[nama]', '$posisi', '$jenis',
'$cabang', '$program', '$tanggal', '$deskripsi', $anggaran, '', '', '', 'Pending', 'Belum Laporan')");
}

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// edit_kepala logistik
function edit_kepala_logistik($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = htmlspecialchars($data["tanggal"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Anggaran $program')");

// update_target
if ($posisi == "Kepala Produksi") {
$update = mysqli_query($conn, "UPDATE `produksi` SET
`tgl_pengajuan` ='$tanggal',
`perencanaan` ='$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");
} else {
if ($program == 'Maintenance') {

$update = mysqli_query($conn, "UPDATE `maintenance` SET
`tgl_pengajuan` ='$tanggal',
`perencanaan` ='$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

} else {

$update = mysqli_query($conn, "UPDATE `baksos` SET
`tgl_pengajuan` ='$tanggal',
`deskripsi`= '$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

}
}

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// laporan kepala logistik
function laporan_kepala_logistik($data)
{
global $conn;

$link = $data["link"];
$id_unik = $data["id_unik"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$program = htmlspecialchars($data["program"]);
$jenis = htmlspecialchars($data["jenis"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);


if ($program == 'Bakti Sosial') {
$update = mysqli_query($conn, "UPDATE `baksos` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id_unik' ");
// die(var_dump($update));

$uploadsDir = '../img/laporan/baksos/';

} elseif ($program == 'Maintenance') {

$update = mysqli_query($conn, "UPDATE `maintenance` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id_unik' ");
// die(var_dump($update));

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/maintenance/';

} else {
$update = mysqli_query($conn, "UPDATE `produksi` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id_unik' ");
// die(var_dump($update));

$uploadsDir = '../img/laporan/produksi/';
}

$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

if ($program == 'Bakti Sosial') {
$result = mysqli_query($conn, "INSERT INTO galeri_baksos VALUES('', '$id_unik', '$link', '$program', '$_SESSION[nama]',
'$namagambarbaru')");

} elseif ($program == 'Maintenance') {
$result = mysqli_query($conn, "INSERT INTO galeri_maintenance VALUES('', '$id_unik', '$link', '$program',
'$_SESSION[nama]',
'$namagambarbaru')");
} else {
$result = mysqli_query($conn, "INSERT INTO galeri_produksi VALUES('', '$id_unik', '$link', '$program',
'$_SESSION[nama]',
'$namagambarbaru')");
}

}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit laporan kepala_logistik
function edit_laporan_kepalaLogistik($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$jenis = htmlspecialchars($data["jenis"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

if ($program == 'Bakti Sosial') {
// update_target
$update = mysqli_query($conn, "UPDATE `baksos` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE `id` = '$id' ");

} elseif ($program == 'Maintenance') {
// update_target
$update = mysqli_query($conn, "UPDATE `maintenance` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE `id` = '$id' ");

} else {
// update_target
$update = mysqli_query($conn, "UPDATE `produksi` SET
`tgl_pemakaian` ='$tanggal',
`deskripsi_pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE `id` = '$id' ");

}

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");
// die(var_dump($update));

return mysqli_affected_rows($conn);

}

// daily_report
function daily_report($data)
{
global $conn;

$link = $data["link"];
$cabang = $data["cabang"];
$posisi = htmlspecialchars($data["posisi"]);
$tanggal = $data["tanggal"];
$aktivitas = htmlspecialchars($data["aktivitas"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// die(var_dump($program));
// cek deskripsi
$query = mysqli_query($conn, "SELECT deskripsi FROM daily_report WHERE deskripsi = '$deskripsi' ");

if (mysqli_fetch_assoc($query)) {

echo "<script>
alert('Deskripsi Sudah Pernah Di Input');
</script>";

return false;
}

$result = mysqli_query($conn, "INSERT INTO daily_report VALUES('', '$link', '$_SESSION[nama]', '$posisi', '$cabang',
'$aktivitas', '$tanggal', '$deskripsi')");

$query = mysqli_query($conn, "SELECT id FROM daily_report WHERE deskripsi = '$deskripsi' ");
$hasil = mysqli_fetch_assoc($query);
$id_hasil = $hasil["id"];

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/daily/';
$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;


// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result3 = mysqli_query($conn, "INSERT INTO galeri_daily VALUES('', '$id_hasil', '$link', '$aktivitas',
'$_SESSION[nama]',
'$namagambarbaru')");
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] Divisi $posisi Telah Menginput Daily Report $posisi')");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// edit_daily
function edit_daily($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$tanggal = $data["tanggal"];
$aktivitas = htmlspecialchars($data["aktivitas"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Daily Report Dari Aktivitas $aktivitas')");

// update_target
$update = mysqli_query($conn, "UPDATE `daily_report` SET
`aktivitas` ='$aktivitas',
`tgl_aktivitas` ='$tanggal',
`deskripsi` ='$deskripsi'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// income humas
function income_celengan($data)
{
global $conn;

$link = $data["link"];
$cabang = $data["cabang"];
$nama = $data["nama"];
$posisi = $data["posisi"];
$kategori = $data["kategori"];
$tanggal = htmlspecialchars($data["tanggal"]);
$lokasi = htmlspecialchars($data["lokasi"]);
$jumlah = htmlspecialchars($data["jumlah"]);
$nom_acak = htmlspecialchars($data["income"]);
$anggar = RemoveSpecialChar($nom_acak);
$income = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "INSERT INTO pemasukan VALUES('', '$link', '$kategori', '$_SESSION[nama]', '$posisi',
'$_SESSION[cabang]',
'$tanggal', '$lokasi', $jumlah, $income, 'Pending')");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);
$query = mysqli_query($conn, "SELECT id FROM pemasukan WHERE income = '$income' AND jumlah = '$jumlah' AND lokasi =
'$lokasi' ORDER BY `id` DESC ");
$hasil = mysqli_fetch_assoc($query);
$id_hasil = $hasil["id"];

// die(var_dump($id_hasil));

$uploadsDir = '../img/laporan/income/';
$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_pemasukan VALUES('', '$id_hasil', '$link', '$kategori',
'$_SESSION[nama]',
'$namagambarbaru')");
}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Telah Melaporkan Income $kategori')");

return mysqli_affected_rows($conn);
}

// edit pemasukan
function edit_pemasukan($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal"];
$lokasi = htmlspecialchars($data["lokasi"]);
$jumlah = htmlspecialchars($data["jumlah"]);
$nom_acak = htmlspecialchars($data["income"]);
$anggar = RemoveSpecialChar($nom_acak);
$income = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Income Dari $program')");

// update_target
$update = mysqli_query($conn, "UPDATE `pemasukan` SET
`tgl_ambil` ='$tanggal',
`lokasi` ='$lokasi',
`jumlah` ='$jumlah',
`income` ='$income'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// ganti profil
function change_profil($data) {
global $conn;

$nama = htmlspecialchars($data["nama"]);
$username = htmlspecialchars($data["username"]);
$posisi = htmlspecialchars($data["posisi"]);
$img = $data["img"];
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");
$gambar = upload();

if (!$gambar) {

$update = mysqli_query($conn, "UPDATE `akun_pengurus` SET
`nama` ='$nama',
`profil` ='$img'
WHERE username = '$username' ");

} else {

if ($img == 'profil.png') {

} else {

unlink("../img/profil/".$img);
unlink("../img/profil/thump_".$img);

}

$update = mysqli_query($conn, "UPDATE `akun_pengurus` SET
`nama` ='$nama',
`profil` ='$gambar'
WHERE username = '$username' ");

// die(var_dump($update));

}

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$nama', '$posisi', '$ip',
'$date', '$nama $posisi Telah Mengubah Profilnya')");

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// income media sosial
function income_media($data)
{
global $conn;

$link = $data["link"];
$posisi = $data["posisi"];
$kategori = $data["kategori"];
$gedung = htmlspecialchars($data["gedung"]);
$tanggal = $data["tanggal"];
$nom_acak = htmlspecialchars($data["income"]);
$anggar = RemoveSpecialChar($nom_acak);
$income = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] Divisi $posisi Telah Melaporkan $kategori Gedung $gedung')");


$result = mysqli_query($conn, "INSERT INTO income VALUES('', '$link', '$kategori', '$_SESSION[nama]', '$posisi',
'$gedung',
'$tanggal', '$income', 'Menunggu Verifikasi')");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);
}

// edit pemasukan Media Sosial
function edit_incomemedia($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$gedung = $data["gedung"];
$tanggal = $data["tanggal"];
$nom_acak = htmlspecialchars($data["income"]);
$anggar = RemoveSpecialChar($nom_acak);
$income = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah Income Dari $gedung')");

// update_target
$update = mysqli_query($conn, "UPDATE `income` SET
`tgl_pemasukan` ='$tanggal',
`income` ='$income'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// edit Gaji
function edit_gaji($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$kategori = $data["program"];
$tanggal = $data["tanggal"];
$deskripsi = $data["deskripsi"];
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$income = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah $kategori')");

// update_target
$update = mysqli_query($conn, "UPDATE `gaji_karyawan` SET
`tgl_dibuat` ='$tanggal',
`deskripsi` ='$deskripsi',
`gaji_karyawan` ='$income'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// edit aset
function edit_aset($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$kategori = $data["program"];
$tanggal = $data["tanggal"];
$qty = $data["qty"];
$deskripsi = $data["deskripsi"];
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah $kategori')");

// update_target
$update = mysqli_query($conn, "UPDATE `aset_yayasan` SET
`tgl_dibuat` ='$tanggal',
`deskripsi` ='$deskripsi',
`qty_anggaran` ='$qty',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// edit operasional
function edit_operasional($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$kategori = $data["program"];
$tanggal = $data["tanggal"];
$deskripsi = $data["deskripsi"];
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah $kategori')");

// update_target
$update = mysqli_query($conn, "UPDATE `operasional_yayasan` SET
`tgl_dibuat` ='$tanggal',
`deskripsi` ='$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// edit lainnya
function edit_lainnya($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$kategori = $data["program"];
$tanggal = $data["tanggal"];
$deskripsi = $data["deskripsi"];
$nom_acak = htmlspecialchars($data["anggaran"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah $kategori')");

// update_target
$update = mysqli_query($conn, "UPDATE `anggaran_lain` SET
`tgl_dibuat` ='$tanggal',
`deskripsi` ='$deskripsi',
`dana_anggaran` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($update));

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

// laporan aset
function laporan_aset($data)
{
global $conn;

$link = $data["link"];
$id2 = htmlspecialchars($data["id"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$qty = htmlspecialchars($data["qty"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

$update = mysqli_query($conn, "UPDATE `aset_yayasan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi_laporan',
`qty_pembelian`= '$qty',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id2' ");
// die(var_dump($update));

$uploadsDir = '../img/laporan/aset/';

$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_aset VALUES('', '$id2', '$link', '$program', '$_SESSION[nama]',
'$namagambarbaru')");

}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi] Management', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Management Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit laporan aset
function edit_laporan_aset($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$qty = htmlspecialchars($data["qty"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update
$update = mysqli_query($conn, "UPDATE `aset_yayasan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi',
`qty_pembelian`= '$qty',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// laporan operasional
function laporan_operasional($data)
{
global $conn;

$link = $data["link"];
$id2 = htmlspecialchars($data["id"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

$update = mysqli_query($conn, "UPDATE `operasional_yayasan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id2' ");
// die(var_dump($update));


$uploadsDir = '../img/laporan/operasional/';

$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_operasional VALUES('', '$id2', '$link', '$program', '$_SESSION[nama]',
'$namagambarbaru')");

}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}


// edit laporan operasional
function edit_laporan_operasional($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update
$update = mysqli_query($conn, "UPDATE `operasional_yayasan` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($result));
return mysqli_affected_rows($conn);
}


// laporan lainnya
function laporan_lainnya($data)
{
global $conn;

$link = $data["link"];
$id2 = htmlspecialchars($data["id"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi_laporan = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$terpakai = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q = mysqli_query($conn, "SELECT akun_pengurus.nama, list_divisi.posisi

FROM akun_pengurus
JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE akun_pengurus.username =
'$_SESSION[username]' ");
$r = mysqli_fetch_array($q);

$update = mysqli_query($conn, "UPDATE `anggaran_lain` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi_laporan',
`dana_terpakai` ='$terpakai',
`laporan` ='Menunggu Verifikasi'
WHERE id = '$id2' ");
// die(var_dump($update));

$uploadsDir = '../img/laporan/lainnya/';

$allowedFileType = array('jpg', 'png', 'jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['gambar']['name']))) {

// Loop through file items
foreach ($_FILES['gambar']['name'] as $id => $val) {
// Get files upload path
$fileName = $_FILES['gambar']['name'][$id];
$ukuran = $_FILES['gambar']['size'][$id];
$tempLocation = $_FILES['gambar']['tmp_name'][$id];

// die(var_dump($tempLocation));
$ekstensigambar = explode('.', $fileName);
$ekstensigambar = strtolower(end($ekstensigambar));
if (!in_array($ekstensigambar, $allowedFileType)) {
echo "<script>
alert('yang di upload bukan gambar');
</script>";
return false;
}

// cek ukuran terlalu bessar
if ($ukuran > 100000000) {
echo "<script>
alert('ukuran terlalu besar Max 30MB');
</script>";
return false;
}

// generate nama batu gambar
$namagambarbaru = uniqid();
$namagambarbaru .= '.';
$namagambarbaru .= $ekstensigambar;

$targetFilePath = $uploadsDir . $namagambarbaru;

// Add into MySQL database

move_uploaded_file($tempLocation, $targetFilePath);

$result = mysqli_query($conn, "INSERT INTO galeri_lainnya VALUES('', '$id2', '$link', '$program', '$_SESSION[nama]',
'$namagambarbaru')");

}
}

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$r[posisi] Management', '$ip',
'$date', '$_SESSION[nama] Divisi $r[posisi] Management Telah Membuat Laporan $program')");

return mysqli_affected_rows($conn);
}

// edit anggaran lainnya
function edit_laporan_lainnya($data)
{
global $conn;

$id = htmlspecialchars($data["id"]);
$posisi = htmlspecialchars($data["posisi"]);
$program = htmlspecialchars($data["program"]);
$tanggal = $data["tanggal_laporan"];
$deskripsi = htmlspecialchars($data["deskripsi_laporan"]);
$nom_acak = htmlspecialchars($data["dana_laporan"]);
$anggar = RemoveSpecialChar($nom_acak);
$anggaran = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Mengubah Laporan Program $program')");

// update
$update = mysqli_query($conn, "UPDATE `anggaran_lain` SET
`tgl_laporan` ='$tanggal',
`pemakaian`= '$deskripsi',
`dana_terpakai` ='$anggaran'
WHERE id = '$id' ");

// die(var_dump($result));
return mysqli_affected_rows($conn);
}

// gabung income
function gabung_income($data)
{
global $conn;

$link = htmlspecialchars($data["link"]);
$posisi = htmlspecialchars($data["posisi"]);
$gedung = htmlspecialchars($data["gedung"]);
$gabung_gedung = htmlspecialchars($data["gabung_gedung"]);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$q_delete = mysqli_query($conn, "SELECT posisi FROM backup_income WHERE posisi = '$posisi' ");

if (mysqli_fetch_assoc($q_delete)) {
} else {
$delete = mysqli_query($conn, "TRUNCATE TABLE backup_income");
// bakcup database
$q = mysqli_query($conn, "SELECT * FROM income");
$i = 1;
while ($r = mysqli_fetch_assoc($q)) {

$ged = $r['gedung'];
$loop_gedung = $ged;

$tgl = $r['tgl_pemasukan'];
$tgl_masuk = $tgl;

$inc = $r['income'];
$income = $inc;

$sts = $r['status'];
$status = $sts;
// die(var_dump($loop_gedung));

// hapus tabel

$bakcup = mysqli_query($conn, "INSERT INTO backup_income VALUES('', '$link', 'Pemasukan Harian', '$_SESSION[nama]',
'$posisi', '$loop_gedung', '$tgl_masuk', '$income', '$status') ");

}
}

// migrasi global income

if ($gedung == 'A') {
$update = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='$gedung'
WHERE gedung = '$gabung_gedung' ");
} elseif ($gedung == 'B') {
$update = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='$gabung_gedung'
WHERE gedung = '$gedung' ");
} elseif ($gedung == 'C') {
$update = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='B'
WHERE gedung = '$gabung_gedung' ");

$update2 = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='B'
WHERE gedung = '$gedung' ");
} else {
$update = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='B'
WHERE gedung = '$gedung' ");

$update2 = mysqli_query($conn, "UPDATE `income` SET
`gedung` ='B'
WHERE gedung = '$gabung_gedung' ");

}

// update grafik
$delete2 = mysqli_query($conn, "TRUNCATE TABLE data_income_new");

if ($gedung == "A") {
$query = mysqli_query($conn, "SELECT * FROM data_income");
while ($data = mysqli_fetch_array($query)) {
$bulan = $data["bulan"];
$tahun = $data["tahun"];
$d_income_a = $data['income_a'];
$d_income_b = $data['income_b'];
$d_income_c = $data['income_c'];
$d_income_d = $data['income_d'];
$d_income_ig = $data['income_instagram'];
$d_income_bogor = $data['income_bogor'];
$d_income_global = $data['income_global'];

$jumlah_income = $d_income_a + $d_income_b;
$jumlah_income2 = $d_income_c + $d_income_d;

$insert_data = mysqli_query($conn, "INSERT INTO data_income_new VALUES('', '$bulan', '$tahun', '$jumlah_income',
'$jumlah_income2', '$d_income_ig', '$d_income_bogor', '$d_income_global') ");

}

} elseif ($gedung == "B") {

$query = mysqli_query($conn, "SELECT * FROM data_income");
while ($data = mysqli_fetch_array($query)) {
$bulan = $data["bulan"];
$tahun = $data["tahun"];
$d_income_a = $data['income_a'];
$d_income_b = $data['income_b'];
$d_income_c = $data['income_c'];
$d_income_d = $data['income_d'];
$d_income_ig = $data['income_instagram'];
$d_income_bogor = $data['income_bogor'];
$d_income_global = $data['income_global'];

$jumlah_income = $d_income_a + $d_income_b;
$jumlah_income2 = $d_income_c + $d_income_d;

$insert_data = mysqli_query($conn, "INSERT INTO data_income_new VALUES('', '$bulan', '$tahun', '$jumlah_income',
'$jumlah_income2', '$d_income_ig', '$d_income_bogor', '$d_income_global') ");

}

} elseif ($gedung == "C") {

$query = mysqli_query($conn, "SELECT * FROM data_income");
while ($data = mysqli_fetch_array($query)) {
$bulan = $data["bulan"];
$tahun = $data["tahun"];
$d_income_a = $data['income_a'];
$d_income_b = $data['income_b'];
$d_income_c = $data['income_c'];
$d_income_d = $data['income_d'];
$d_income_ig = $data['income_instagram'];
$d_income_bogor = $data['income_bogor'];
$d_income_global = $data['income_global'];

$jumlah_income = $d_income_a + $d_income_b;
$jumlah_income2 = $d_income_c + $d_income_d;

$insert_data = mysqli_query($conn, "INSERT INTO data_income_new VALUES('', '$bulan', '$tahun', '$jumlah_income',
'$jumlah_income2', '$d_income_ig', '$d_income_bogor', '$d_income_global') ");

}

} else {

$query = mysqli_query($conn, "SELECT * FROM data_income");
while ($data = mysqli_fetch_array($query)) {
$bulan = $data["bulan"];
$tahun = $data["tahun"];
$d_income_a = $data['income_a'];
$d_income_b = $data['income_b'];
$d_income_c = $data['income_c'];
$d_income_d = $data['income_d'];
$d_income_ig = $data['income_instagram'];
$d_income_bogor = $data['income_bogor'];
$d_income_global = $data['income_global'];

$jumlah_income = $d_income_a + $d_income_b;
$jumlah_income2 = $d_income_c + $d_income_d;

$insert_data = mysqli_query($conn, "INSERT INTO data_income_new VALUES('', '$bulan', '$tahun', '$jumlah_income',
'$jumlah_income2', '$d_income_ig', '$d_income_bogor', '$d_income_global') ");

}

}


$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$posisi', '$ip',
'$date', '$_SESSION[nama] $posisi Telah Menggabungkan income gedung $gedung dengan gedung $gabung_gedung')");

// die(var_dump($result));
return mysqli_affected_rows($conn);

}

function cashback($data)
{
global $conn;

$link = $data["link"];
$program = $data["program"];
$tanggal = $data["tanggal"];
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["cashback"]);
$anggar = RemoveSpecialChar($nom_acak);
$cashback = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

// input data ke database
$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] Divisi $_SESSION[posisi] Telah Melaporkan dana $program ')");

$result = mysqli_query($conn, "INSERT INTO cashback VALUES('', '$link', '$program', '$_SESSION[nama]',
'$_SESSION[posisi]', '$tanggal', '$deskripsi', '$cashback', 'Menunggu Verifikasi')");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);

}

function edit_cashback($data)
{
global $conn;

$kategori = $data["program"];
$id = $data["id"];
$tanggal = htmlspecialchars($data["tanggal"]);
$deskripsi = htmlspecialchars($data["deskripsi"]);
$nom_acak = htmlspecialchars($data["cashback"]);
$anggar = RemoveSpecialChar($nom_acak);
$cashback = str_replace(' ', '', $anggar);
$ip = get_client_ip();
$date = date("Y-m-d H:i:s");

$result2 = mysqli_query($conn, "INSERT INTO log_aktivity VALUES('', '$_SESSION[nama]', '$_SESSION[posisi]', '$ip',
'$date', '$_SESSION[nama] $_SESSION[posisi] Telah Mengubah Laporan dana $kategori')");

// update
$update = mysqli_query($conn, "UPDATE `cashback` SET
`tgl_cashback` ='$tanggal',
`deskripsi`= '$deskripsi',
`cashback` ='$cashback'
WHERE id = '$id' ");

// die(var_dump($simpan));
return mysqli_affected_rows($conn);

}



?>