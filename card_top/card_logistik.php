<?php

// program
if ($pengurus_id == "kepala_logistik") {
    if ($linkid_logistik == 'produksi') { 
    $q = mysqli_query($conn, "SELECT * FROM data_produksi");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_anggaran = $r['anggaran_produksi_bogor'];
        $total_anggaran[$i] = $d_anggaran;

        $hasil_anggaran = array_sum($total_anggaran);

        $d_terpakai = $r['terpakai_produksi_bogor'];
        $total_terpakai[$i] = $d_terpakai;

        $hasil_terpakai = array_sum($total_terpakai);

        $cashback   = $hasil_anggaran - $hasil_terpakai;

    }
    } elseif ($linkid_logistik == 'baksos') {
    $q = mysqli_query($conn, "SELECT * FROM data_baksos");
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

        $cashback   = $hasil_anggaran - $hasil_terpakai;

    }

} elseif ($linkid_logistik == 'maintenance') {
    $q = mysqli_query($conn, "SELECT * FROM data_maintenance");
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

        $cashback   = $hasil_anggaran - $hasil_terpakai;

    }
} else {
    $q = mysqli_query($conn, "SELECT * FROM data_logistik");
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

        $cashback   = $hasil_anggaran - $hasil_terpakai;

    }
}
} elseif ($pengurus_id == "logistik" && $_SESSION['cabang'] == "Depok") {
    if ($linkid_taman == "operasional_yayasan") {
        $q = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan");
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
            $cashback   = $hasil_anggaran - $hasil_terpakai;

        }
    } else {
        $q = mysqli_query($conn, "SELECT * FROM data_logistik");
        $i = 1;
        $sql = $q;
        while($r = mysqli_fetch_array($sql))
        {
            $i++;   
            $d_anggaran = $r['anggaran_logistik_depok'];
            $total_anggaran[$i] = $d_anggaran;
    
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $r['terpakai_logistik_depok'];
            $total_terpakai[$i] = $d_terpakai;
    
            $hasil_terpakai = array_sum($total_terpakai);
            $cashback   = $hasil_anggaran - $hasil_terpakai;
    
        }
    }
    

    $q2 = mysqli_query($conn, "SELECT * FROM data_gaji");
    $sql2 = $q2;
    while($r2 = mysqli_fetch_array($sql2))
    {
        $i++;   
        $d_anggaran2 = $r2['terpakai_global'];
        $total_anggaran2[$i] = $d_anggaran2;

        $hasil_anggaran2 = array_sum($total_anggaran2);
    }

    $q3 = mysqli_query($conn, "SELECT * FROM data_aset_yayasan");
    $sql3 = $q3;
    while($r3 = mysqli_fetch_array($sql3))
    {
        $i++;   
        $d_anggaran3 = $r3['terpakai_global'];
        $total_anggaran3[$i] = $d_anggaran3;

        $hasil_anggaran3 = array_sum($total_anggaran3);
    }

    $q4 = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan");
    $sql4 = $q4;
    while($r4 = mysqli_fetch_array($sql4))
    {
        $i++;   
        $d_anggaran4 = $r4['terpakai_global'];
        $total_anggaran4[$i] = $d_anggaran4;

        $hasil_anggaran4 = array_sum($total_anggaran4);
    }

    $q5 = mysqli_query($conn, "SELECT * FROM data_lainnya");
    $sql5 = $q5;
    while($r5 = mysqli_fetch_array($sql5))
    {
        $i++;   
        $d_anggaran5 = $r5['terpakai_global'];
        $total_anggaran5[$i] = $d_anggaran5;

        $hasil_anggaran5 = array_sum($total_anggaran5);
    }
} else {
        $q = mysqli_query($conn, "SELECT * FROM data_logistik");
        $i = 1;
        $sql = $q;
        while($r = mysqli_fetch_array($sql))
        {
            $i++;   
            $d_anggaran = $r['anggaran_logistik_bogor'];
            $total_anggaran[$i] = $d_anggaran;
        
            $hasil_anggaran = array_sum($total_anggaran);
        
            $d_terpakai = $r['terpakai_logistik_bogor'];
            $total_terpakai[$i] = $d_terpakai;
        
            $hasil_terpakai = array_sum($total_terpakai);
            $cashback   = $hasil_anggaran - $hasil_terpakai;

        }
    
}



?>

<?php if ($posisi == 'Logistik Gedung Management') { ?>
<!-- Program Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Pengeluaran Logistk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- pengeluaran gaji -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Gaji Karyawan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran2,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- aset yayasan -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Aset Yayasan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran3,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-landmark fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- biaya lainnya -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pengeluaran Biaya Lainnya</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran5,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-wallet fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } elseif ($pengurus_id == "kepala_logistik") { ?>
<!-- Pengeluaran Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Anggaran Global</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <?php if ($linkid_logistik == 'produksi') { ?>
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'baksos') { ?>
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'maintenance') { ?>
                    <i class="fas fa-tools fa-2x text-gray-300"></i>
                    <?php } else { ?>
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pengeluaran Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Global</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <?php if ($linkid_logistik == 'produksi') { ?>
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'baksos') { ?>
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'maintenance') { ?>
                    <i class="fas fa-tools fa-2x text-gray-300"></i>
                    <?php } else { ?>
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pengeluaran Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Global
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?= number_format($cashback,0,"." , ".") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <?php if ($linkid_logistik == 'produksi') { ?>
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'baksos') { ?>
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    <?php } elseif ($linkid_logistik == 'maintenance') { ?>
                    <i class="fas fa-tools fa-2x text-gray-300"></i>
                    <?php } else { ?>
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else { ?>
<?php if ($linkid_taman == "operasional_yayasan") { ?>
<!-- Program Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Anggaran Operasional Yayasan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Program Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Pengeluaran Operasional Yayasan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aktifitas Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Cashback
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?= number_format($cashback,0,"." , ".") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<!-- Program Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Anggaran Logistk</div>
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
                        Pengeluaran Logistk</div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Cashback
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?= number_format($cashback,0,"." , ".") ?>
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

<?php } ?>