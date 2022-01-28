<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(daily_report($_POST) > 0 ) {
        echo "<script>
                alert('Daily Report Berhasil Diinput');
                document.location.href = '$link.php?id_input=daily_program';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input_ap"]) ) {
    $link = $_SESSION["username"];
    if(daily_report($_POST) > 0 ) {
        echo "<script>
                alert('Daily Report Berhasil Diinput');
                document.location.href = '$link.php';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

// program
if ($pengurus_id == "ketua_yayasan") {
    $q = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' ORDER BY `tgl_aktivitas` DESC ");

    $s = $q->num_rows;

    // program depok
} elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Depok") {
    $q = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' AND daily_report.cabang = '$_SESSION[cabang]' ORDER BY `tgl_aktivitas` DESC ");

    $s = $q->num_rows;

} elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Bogor") {
    $q = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' AND daily_report.cabang = '$_SESSION[cabang]' ORDER BY `tgl_aktivitas` DESC ");

    $s = $q->num_rows;
    
} elseif ($pengurus_id == "kepala_cabang" && $_SESSION['cabang'] == "Bogor") {
    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE cabang = '$_SESSION[cabang]' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {
    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Bogor") {
    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Depok") {
    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} else {
    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

}
    
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
        <?php if ($pengurus_id == "ketua_yayasan") { ?>
        <?php } else { ?>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
            <ul class="pagination shadow-lg">
                <li class="page-item active"><a class="page-link" href="#" data-toggle="modal"
                        data-target="#exampleModal"> <small class="text-white"><b><span
                                    style="font-size:15px;">&#43;</span>&nbsp;Input Aktivifitas Kamu
                                Hari Ini &#128522;</b>
                        </small>
                    </a></li>
            </ul>
        </div>
        <?php } ?>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <?php if ($pengurus_id == "ketua_yayasan") { ?>
                <label for=""><b>Daily Aktivifas Program</b>
                    <hr>
                </label>
                <?php } else { ?>
                <label for=""><b>Daily Aktivifas <?= $has_kueri["posisi"]; ?></b>
                    <hr>
                </label>
                <?php } ?>
                <div class="table-responsive">
                    <table id="tabel-data_daily" class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Cabang</th>
                                <th scope="col">Aktivitas</th>
                                <th scope="col">Tgl Aktivitas</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Pengaturan</th>
                                <th scope="col">Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_aktivitas'], 5,-3);
                                $convert   = convertDateDBtoIndo($r['tgl_aktivitas']);
                                ?>

                            <tr>
                                <td style="text-align: center;"><?= $no++ ?></td>
                                <td><?= ucwords($r['nama']) ?></td>
                                <td><?= ucwords($r['posisi']) ?></td>
                                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                <td><?= ucwords($r['aktivitas']) ?></td>
                                <td style="text-align: center;">
                                    <?= $convert ?></td>
                                <td><?= ucwords($r['deskripsi']) ?></td>
                                <?php if($r['nama'] == $_SESSION['nama']){ ?>
                                <td style=" text-align: center;"><a class="btn btn-primary"
                                        href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_daily&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Daily ini mau diedit?!')">Edit</a> || <a
                                        class="btn btn-danger"
                                        href="../content/hapus/hapus_daily.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Anda Yakin Mau Menghapus Daily ini ?')">Hapus</a>
                                </td>
                                <?php } else { ?>
                                <td style=" text-align: center;" class="disabled"><a class="btn btn-primary disable"
                                        href="#">Edit</a> || <a class="btn btn-danger disable" href="#">Hapus</a>
                                </td>
                                <?php } ?>
                                <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                        data-id="<?= $r['id']  ?>" data-name="<?= $r['id_pengurus'] ?>"
                                        class="btn btn-primary btn-xs view_data_daily">
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div id="dataModal_daily" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Dokumentasi</h4>
                                </div>
                                <div class="modal-body" id="detail_user_daily">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal daily report-->
<?php
include 'modal_daily.php';
?>