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

// pemasukan global
$income_global = $hasil_terpakai7 + $total_income;

// pengeluaran global
$terpakai_global = $hasil_terpakai + $hasil_terpakai2 + $hasil_terpakai3 + $hasil_terpakai4 + $hasil_terpakai8 + $hasil_terpakai9 + $hasil_terpakai10 + $hasil_terpakai11 + $hasil_terpakai12 + $hasil_terpakai13;

// cashback global

$cashback_global = $income_global - $terpakai_global;



?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Global Yayasan 2021</h1>
    </div>
    <div class="row">
        <!-- pemasukan global -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pemasukan Global</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($income_global,0,"." , ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pengeluaran -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pengeluaran Global</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($terpakai_global,0,"." , ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-share-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cashback -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-bottom-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Cashback Global</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($cashback_global,0,"." , ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cashback di input-->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Cashback Terinput</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                <?= number_format($hasil_terpakai14,0,"." , ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Body -->
            <div class="card shadow">

            </div>
        </div>
    </div>