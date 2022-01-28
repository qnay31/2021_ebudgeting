<?php

// program
if ($pengurus_id == "kepala_humas") {
    $q = mysqli_query($conn, "SELECT * FROM data_humas");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_global'];
        $total_anggaran[$i] = $d_anggaran;

        $hasil_anggaran = array_sum($total_anggaran);

        $d_terpakai = $r['terpakai_global'];
        $total_terpakai[$i] = $d_terpakai;

        $hasil_terpakai = array_sum($total_terpakai);


    }
} elseif ($pengurus_id == "humas" && $_SESSION['cabang'] == "Depok") {
    $q = mysqli_query($conn, "SELECT * FROM data_humas");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_humas_depok'];
        $total_anggaran[$i] = $d_anggaran;

        $hasil_anggaran = array_sum($total_anggaran);

        $d_terpakai = $r['terpakai_humas_depok'];
        $total_terpakai[$i] = $d_terpakai;

        $hasil_terpakai = array_sum($total_terpakai);

    }
} else {
    $q = mysqli_query($conn, "SELECT * FROM data_humas");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_humas_bogor'];
        $total_anggaran[$i] = $d_anggaran;
    
        $hasil_anggaran = array_sum($total_anggaran);
    
        $d_terpakai = $r['terpakai_humas_bogor'];
        $total_terpakai[$i] = $d_terpakai;
    
        $hasil_terpakai = array_sum($total_terpakai);

    
    }
}

$q2 = mysqli_query($conn, "SELECT * FROM data_pemasukan");
$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{   
    $i++;
    $d_terpakai5 = $r2['pemasukan_celengan'];
    $total_terpakai5[$i] = $d_terpakai5;

    $hasil_terpakai5 = array_sum($total_terpakai5);

    $d_terpakai6 = $r2['pemasukan_kotak_amal'];
    $total_terpakai6[$i] = $d_terpakai6;

    $hasil_terpakai6 = array_sum($total_terpakai6);
    $total_income = $hasil_terpakai5 + $hasil_terpakai6;
}


?>

<!-- Program Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Anggaran Humas</div>
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
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Humas</div>
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
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemasukan Humas
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                Rp. <?= number_format($total_income,0,"." , ".") ?>
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