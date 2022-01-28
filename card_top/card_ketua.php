<?php

// program
$q = mysqli_query($conn, "SELECT * FROM data_program");
$i = 1;
$sql = $q;
while($r = mysqli_fetch_array($sql))
{
    $i++;   
    $d_terpakai = $r['terpakai_global'];
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
    $d_terpakai3 = $r3['terpakai_global'];
    $total_terpakai3[$i] = $d_terpakai3;

    $hasil_terpakai3 = array_sum($total_terpakai3);
}

// humas
$q4 = mysqli_query($conn, "SELECT * FROM data_humas");
$sql4 = $q4;
while($r4 = mysqli_fetch_array($sql4))
{   
    $i++;
    $d_terpakai4 = $r4['terpakai_global'];
    $total_terpakai4[$i] = $d_terpakai4;

    $hasil_terpakai4 = array_sum($total_terpakai4);
}

$q5 = mysqli_query($conn, "SELECT * FROM data_pemasukan");
$sql5 = $q5;
while($r5 = mysqli_fetch_array($sql5))
{   
    $i++;
    $d_terpakai5 = $r5['pemasukan_celengan'];
    $total_terpakai5[$i] = $d_terpakai5;

    $hasil_terpakai5 = array_sum($total_terpakai5);

    $d_terpakai6 = $r5['pemasukan_kotak_amal'];
    $total_terpakai6[$i] = $d_terpakai6;

    $hasil_terpakai6 = array_sum($total_terpakai6);
    $total_income = $hasil_terpakai5 + $hasil_terpakai6;
}

$q7 = mysqli_query($conn, "SELECT * FROM data_income_new");
$sql7 = $q7;
while($r7 = mysqli_fetch_array($sql7))
{   
    $i++;
    $d_terpakai7 = $r7['income_global'];
    $total_terpakai7[$i] = $d_terpakai7;

    $hasil_terpakai7 = array_sum($total_terpakai7);
}

$q8 = mysqli_query($conn, "SELECT * FROM data_gaji");
$sql8 = $q8;
while($r8 = mysqli_fetch_array($sql8))
{   
    $i++;
    $d_terpakai8 = $r8['terpakai_global'];
    $total_terpakai8[$i] = $d_terpakai8;

    $hasil_terpakai8 = array_sum($total_terpakai8);
}

$q9 = mysqli_query($conn, "SELECT * FROM data_aset_yayasan");
$sql9 = $q9;
while($r9 = mysqli_fetch_array($sql9))
{   
    $i++;
    $d_terpakai9 = $r9['terpakai_global'];
    $total_terpakai9[$i] = $d_terpakai9;

    $hasil_terpakai9 = array_sum($total_terpakai9);
}

$q10 = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan");
$sql10 = $q10;
while($r10 = mysqli_fetch_array($sql10))
{   
    $i++;
    $d_terpakai10 = $r10['terpakai_global'];
    $total_terpakai10[$i] = $d_terpakai10;

    $hasil_terpakai10 = array_sum($total_terpakai10);
}

$q11 = mysqli_query($conn, "SELECT * FROM data_lainnya");
$sql11 = $q11;
while($r11 = mysqli_fetch_array($sql11))
{   
    $i++;
    $d_terpakai11 = $r11['terpakai_global'];
    $total_terpakai11[$i] = $d_terpakai11;

    $hasil_terpakai11 = array_sum($total_terpakai11);
}

$q12 = mysqli_query($conn, "SELECT * FROM data_produksi");
$sql12 = $q12;
while($r12 = mysqli_fetch_array($sql12))
{   
    $i++;
    $d_terpakai12 = $r12['terpakai_global'];
    $total_terpakai12[$i] = $d_terpakai12;

    $hasil_terpakai12 = array_sum($total_terpakai12);
}

$q13 = mysqli_query($conn, "SELECT * FROM data_maintenance");
$sql13 = $q13;
while($r13 = mysqli_fetch_array($sql13))
{   
    $i++;
    $d_terpakai13 = $r13['terpakai_global'];
    $total_terpakai13[$i] = $d_terpakai13;

    $hasil_terpakai13 = array_sum($total_terpakai13);
}

$q14 = mysqli_query($conn, "SELECT * FROM data_cashback");
$sql14 = $q14;
while($r14 = mysqli_fetch_array($sql14))
{   
    $i++;
    $d_terpakai14 = $r14['cashback_global'];
    $total_terpakai14[$i] = $d_terpakai14;

    $hasil_terpakai14 = array_sum($total_terpakai14);
}

?>

<!-- Program Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
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
<div class="col-xl-4 col-md-6 mb-4">
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
<div class="col-xl-4 col-md-6 mb-4">
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
<div class="col-xl-4 col-md-6 mb-4">
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

<!-- pengeluaran gaji karyawan -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Gaji Karyawan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai8,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- aset yayasan -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Aset Yayasan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai9,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-landmark fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- operasional yayasan -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Pengeluaran Operasional Yayasan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai10,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- dana lainnya -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pengeluaran Biaya Lainnya</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai11,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-wallet fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- produksi -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Produksi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai12,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- maintenance -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Maintenance</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai13,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tools fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- laporan pemasukan humas -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Pemasukan Humas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($total_income,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- laporan pemasukan media sosial -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Pemasukan Media Sosial</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai7,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- laporan Cashback -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Dana Cashback</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai14,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>