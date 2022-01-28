<?php

// program
if ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Depok") {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_program_depok'];
        $total_anggaran[$i] = $d_anggaran;

        $hasil_anggaran = array_sum($total_anggaran);

        $d_terpakai = $r['terpakai_program_depok'];
        $total_terpakai[$i] = $d_terpakai;

        $hasil_terpakai = array_sum($total_terpakai);

    }
} elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Bogor") {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_program_bogor'];
        $total_anggaran[$i] = $d_anggaran;

        $hasil_anggaran = array_sum($total_anggaran);

        $d_terpakai = $r['terpakai_program_bogor'];
        $total_terpakai[$i] = $d_terpakai;

        $hasil_terpakai = array_sum($total_terpakai);

    }
} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_kesehatan'];
        $total_anggaran[$i] = $d_anggaran;
    
        $hasil_anggaran = array_sum($total_anggaran);
    
        $d_terpakai = $r['terpakai_kesehatan'];
        $total_terpakai[$i] = $d_terpakai;
    
        $hasil_terpakai = array_sum($total_terpakai);
    
    }
} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Bogor") {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_kesehatan_bogor'];
        $total_anggaran[$i] = $d_anggaran;
    
        $hasil_anggaran = array_sum($total_anggaran);
    
        $d_terpakai = $r['terpakai_kesehatan_bogor'];
        $total_terpakai[$i] = $d_terpakai;
    
        $hasil_terpakai = array_sum($total_terpakai);
    
    }
} elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Depok") {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_pendidikan'];
        $total_anggaran[$i] = $d_anggaran;
    
        $hasil_anggaran = array_sum($total_anggaran);
    
        $d_terpakai = $r['terpakai_pendidikan'];
        $total_terpakai[$i] = $d_terpakai;
    
        $hasil_terpakai = array_sum($total_terpakai);
    
    }
} elseif ($pengurus_id == "ap_pendidikan" && $_SESSION['cabang'] == "Depok") {

    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} elseif ($pengurus_id == "ap_kesehatan" && $_SESSION['cabang'] == "Depok") {

    $q  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $s = $q->num_rows;

} else {
    $q = mysqli_query($conn, "SELECT * FROM data_program");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_pendidikan_bogor'];
        $total_anggaran[$i] = $d_anggaran;
    
        $hasil_anggaran = array_sum($total_anggaran);
    
        $d_terpakai = $r['terpakai_pendidikan_bogor'];
        $total_terpakai[$i] = $d_terpakai;
    
        $hasil_terpakai = array_sum($total_terpakai);
    
    }
}

if ($pengurus_id == "ketua_yayasan") {
    $k = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' ORDER BY `tgl_aktivitas` DESC ");

    $a = $k->num_rows;

    // program depok
} elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Depok") {
    $k = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' AND daily_report.cabang = '$_SESSION[cabang]' ORDER BY `tgl_aktivitas` DESC ");

    $a = $k->num_rows;

} elseif ($pengurus_id == "kepala_program" && $_SESSION['cabang'] == "Bogor") {
    $k = mysqli_query($conn, "SELECT daily_report.nama, daily_report.id, daily_report.id_pengurus, daily_report.posisi, daily_report.cabang, daily_report.aktivitas, daily_report.tgl_aktivitas, daily_report.deskripsi, list_divisi.posisi 
    FROM daily_report
    JOIN list_divisi ON list_divisi.id_pengurus = daily_report.id_pengurus WHERE list_divisi.akses = 'program' AND daily_report.cabang = '$_SESSION[cabang]' ORDER BY `tgl_aktivitas` DESC ");

    $a = $k->num_rows;

} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {
    $k  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $a = $k->num_rows;

} elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Bogor") {
    $k  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $a = $k->num_rows;

} elseif ($pengurus_id == "program_pendidikan" && $_SESSION['cabang'] == "Depok") {
    $k  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $a = $k->num_rows;

} else {
    $k  = mysqli_query($conn, "SELECT * FROM daily_report WHERE id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' ORDER BY `tgl_aktivitas` DESC");

    $a = $k->num_rows;

}


?>
<?php if($pengurus_id == "ap_pendidikan"){ ?>
<!-- Aktifitas Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Aktivitas
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $a ?> Aktivitas
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
<!-- Aktifitas Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Aktivitas
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $a ?> Aktivitas
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else { ?>
<!-- Program Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Anggaran Program</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Program Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Program</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aktifitas Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Aktivitas
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $a ?> Aktivitas
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>