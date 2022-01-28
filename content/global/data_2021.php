<?php
// program
$q = mysqli_query($conn, "SELECT * FROM data_program");
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
    $cashback = $hasil_anggaran - $hasil_terpakai;
}

// baksos
$q2 = mysqli_query($conn, "SELECT * FROM data_baksos");
$sql2 = $q2;
while($r2 = mysqli_fetch_array($sql2))
{
    $i++;
    $d_anggaran2 = $r2['anggaran_global'];
    $total_anggaran2[$i] = $d_anggaran2;

    $hasil_anggaran2 = array_sum($total_anggaran2);

    $d_terpakai2 = $r2['terpakai_global'];
    $total_terpakai2[$i] = $d_terpakai2;

    $hasil_terpakai2 = array_sum($total_terpakai2);
    $cashback2 = $hasil_anggaran2 - $hasil_terpakai2;
}

// logistik
$q3 = mysqli_query($conn, "SELECT * FROM data_logistik");
$sql3 = $q3;
while($r3 = mysqli_fetch_array($sql3))
{   
    $i++;
    $d_anggaran3 = $r3['anggaran_global'];
    $total_anggaran3[$i] = $d_anggaran3;

    $hasil_anggaran3 = array_sum($total_anggaran3);

    $d_terpakai3 = $r3['terpakai_global'];
    $total_terpakai3[$i] = $d_terpakai3;

    $hasil_terpakai3 = array_sum($total_terpakai3);
    $cashback3 = $hasil_anggaran3 - $hasil_terpakai3;
}

// humas
$q4 = mysqli_query($conn, "SELECT * FROM data_humas");
$sql4 = $q4;
while($r4 = mysqli_fetch_array($sql4))
{   
    $i++;
    $d_anggaran4 = $r4['anggaran_global'];
    $total_anggaran4[$i] = $d_anggaran4;

    $hasil_anggaran4 = array_sum($total_anggaran4);

    $d_terpakai4 = $r4['terpakai_global'];
    $total_terpakai4[$i] = $d_terpakai4;

    $hasil_terpakai4 = array_sum($total_terpakai4);

    $cashback4 = $hasil_anggaran4 - $hasil_terpakai4;
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
    $d_anggaran8 = $r8['anggaran_global'];
    $total_anggaran8[$i] = $d_anggaran8;

    $hasil_anggaran8 = array_sum($total_anggaran8);

    $d_terpakai8 = $r8['terpakai_global'];
    $total_terpakai8[$i] = $d_terpakai8;

    $hasil_terpakai8 = array_sum($total_terpakai8);
    $cashback8 = $hasil_anggaran8 - $hasil_terpakai8;
}

$q9 = mysqli_query($conn, "SELECT * FROM data_aset_yayasan");
$sql9 = $q9;
while($r9 = mysqli_fetch_array($sql9))
{   
    $i++;
    $d_anggaran9 = $r9['anggaran_global'];
    $total_anggaran9[$i] = $d_anggaran9;

    $hasil_anggaran9 = array_sum($total_anggaran9);

    $d_terpakai9 = $r9['terpakai_global'];
    $total_terpakai9[$i] = $d_terpakai9;

    $hasil_terpakai9 = array_sum($total_terpakai9);
    $cashback9 = $hasil_anggaran9 - $hasil_terpakai9;
}

$q10 = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan");
$sql10 = $q10;
while($r10 = mysqli_fetch_array($sql10))
{   
    $i++;
    $d_anggaran10 = $r10['anggaran_global'];
    $total_anggaran10[$i] = $d_anggaran10;

    $hasil_anggaran10 = array_sum($total_anggaran10);

    $d_terpakai10 = $r10['terpakai_global'];
    $total_terpakai10[$i] = $d_terpakai10;

    $hasil_terpakai10 = array_sum($total_terpakai10);
    $cashback10 = $hasil_anggaran10 - $hasil_terpakai10;
}

$q11 = mysqli_query($conn, "SELECT * FROM data_lainnya");
$sql11 = $q11;
while($r11 = mysqli_fetch_array($sql11))
{   
    $i++;
    $d_anggaran11 = $r11['anggaran_global'];
    $total_anggaran11[$i] = $d_anggaran11;

    $hasil_anggaran11 = array_sum($total_anggaran11);

    $d_terpakai11 = $r11['terpakai_global'];
    $total_terpakai11[$i] = $d_terpakai11;

    $hasil_terpakai11 = array_sum($total_terpakai11);
    $cashback11 = $hasil_anggaran11 - $hasil_terpakai11;
}

$q12 = mysqli_query($conn, "SELECT * FROM data_produksi");
$sql12 = $q12;
while($r12 = mysqli_fetch_array($sql12))
{   
    $i++;
    $d_anggaran12 = $r12['anggaran_global'];
    $total_anggaran12[$i] = $d_anggaran12;

    $hasil_anggaran12 = array_sum($total_anggaran12);

    $d_terpakai12 = $r12['terpakai_global'];
    $total_terpakai12[$i] = $d_terpakai12;

    $hasil_terpakai12 = array_sum($total_terpakai12);
    $cashback12 = $hasil_anggaran12 - $hasil_terpakai12;
}

$q13 = mysqli_query($conn, "SELECT * FROM data_maintenance");
$sql13 = $q13;
while($r13 = mysqli_fetch_array($sql13))
{   
    $i++;
    $d_anggaran13 = $r13['anggaran_global'];
    $total_anggaran13[$i] = $d_anggaran13;

    $hasil_anggaran13 = array_sum($total_anggaran13);

    $d_terpakai13 = $r13['terpakai_global'];
    $total_terpakai13[$i] = $d_terpakai13;

    $hasil_terpakai13 = array_sum($total_terpakai13);
    $cashback13 = $hasil_anggaran13 - $hasil_terpakai13;
}

$income_humas = $total_income - $hasil_terpakai4;

// anggaran global
$anggaran_global = $hasil_anggaran+$hasil_anggaran2+$hasil_anggaran3+$hasil_anggaran4+$hasil_anggaran8+$hasil_anggaran9+$hasil_anggaran10+$hasil_anggaran11+$hasil_anggaran12+$hasil_anggaran13;
// terpakai global
$terpakai_global = $hasil_terpakai+$hasil_terpakai2+$hasil_terpakai3+$hasil_terpakai4+$hasil_terpakai8+$hasil_terpakai9+$hasil_terpakai10+$hasil_terpakai11+$hasil_terpakai12+$hasil_terpakai13;
// cashback global
$cashback_global = $anggaran_global - $terpakai_global;
// pemasukan global
$pemasukan_global = $hasil_terpakai7+$total_income;
// saldo global
$saldo_tahunan = $pemasukan_global - $terpakai_global;

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

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DataBase 2021</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active">
                        <a class="page-link" href="<?= $_SESSION["username"] ?>.php?id_laporan=laporan_2021">
                            <small class="text-white">Data Tahunan&nbsp;</small>
                        </a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021">
                            <small>Data Bulanan&nbsp;</small>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Laporan Tahunan Yayasan Alkirom Amanah</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Anggaran Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($anggaran_global,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Terpakai Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($terpakai_global,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pemasukan Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($pemasukan_global,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengeluaran Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($terpakai_global,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center text-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Cashback Anggaran Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($cashback_global,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center text-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sisa Saldo Tahunan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($saldo_tahunan,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center text-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Cashback Uang Cash Terkumpul</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                <?= number_format($hasil_terpakai14,0,"." , ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="tabel-data_global_tahunan" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Anggaran</th>
                                <th scope="col">Terpakai</th>
                                <th scope="col">Cashback</th>
                                <th scope="col">Pemasukan</th>
                                <th scope="col">Pengeluaran</th>
                                <th scope="col">Sisa Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>Income Media Sosial</td>
                                <td>Rp. 0</td>
                                <td>Rp. 0</td>
                                <td>Rp. 0</td>
                                <td>Rp. <?= number_format($hasil_terpakai7,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. <?= number_format($hasil_terpakai7,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">2</td>
                                <td>Humas Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran4,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai4,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback4,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($total_income,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai4,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($income_humas,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">3</td>
                                <td>Program Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">4</td>
                                <td>Bakti Sosial</td>
                                <td>Rp. <?= number_format($hasil_anggaran2,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai2,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback2,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai2,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai2,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">5</td>
                                <td>Logistik Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran3,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai3,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback3,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai3,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai3,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">6</td>
                                <td>Gaji Karyawan Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran8,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai8,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback8,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai8,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai8,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">7</td>
                                <td>Aset Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran9,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai9,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback9,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai9,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai9,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">8</td>
                                <td>Operasional Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran10,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai10,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback10,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai10,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai10,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">9</td>
                                <td>Biaya Lainnya Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran11,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai11,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback11,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai11,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai11,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">10</td>
                                <td>Produksi Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran12,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai12,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback12,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai12,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai12,0,"." , ".") ?></td>
                            </tr>

                            <tr>
                                <td style="text-align: center;">11</td>
                                <td>Maintenance Yayasan</td>
                                <td>Rp. <?= number_format($hasil_anggaran13,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($hasil_terpakai13,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($cashback13,0,"." , ".") ?></td>
                                <td>Rp. 0</td>
                                <td>Rp. -<?= number_format($hasil_terpakai13,0,"." , ".") ?></td>
                                <td>Rp. -<?= number_format($hasil_terpakai13,0,"." , ".") ?></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th colspan="2">Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>