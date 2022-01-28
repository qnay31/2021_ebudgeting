<?php

// program
$q = mysqli_query($conn, "SELECT * FROM data_program");
$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $i++;   
    $d_terpakai = $r['terpakai_program_bogor'];
    $total_terpakai[$i] = $d_terpakai;

    $hasil_terpakai = array_sum($total_terpakai);
}

// baksos
$q2 = mysqli_query($conn, "SELECT * FROM data_baksos");
$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{
    $i++;
    $d_terpakai2 = $r2['terpakai_global'];
    $total_terpakai2[$i] = $d_terpakai2;

    $hasil_terpakai2 = array_sum($total_terpakai2);
}

// logistik
$q3 = mysqli_query($conn, "SELECT * FROM data_logistik");
$sql3 = $q3;
while($r3 = mysqli_fetch_array($sql3))
{   
    $i++;
    $d_terpakai3 = $r3['terpakai_logistik_bogor'];
    $total_terpakai3[$i] = $d_terpakai3;

    $hasil_terpakai3 = array_sum($total_terpakai3);
}

// humas
$q4 = mysqli_query($conn, "SELECT * FROM data_humas");
$sql4 = $q4;
while($r4 = mysqli_fetch_array($sql4))
{   
    $i++;
    $d_terpakai4 = $r4['terpakai_humas_bogor'];
    $total_terpakai4[$i] = $d_terpakai4;

    $hasil_terpakai4 = array_sum($total_terpakai4);
}

?>

<!-- Program Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Program</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Baksos Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Bakti Sosial</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai2,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logistik Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran Logistik
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.
                                <?= number_format($hasil_terpakai3,0,"." , ".") ?></div>
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

<!-- Pengeluaran Humas Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pengeluaran Humas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai4,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-pallet fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>