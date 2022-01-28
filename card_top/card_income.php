<?php

if ($linkid_cashback == 'cashback') {
    $q = mysqli_query($conn, "SELECT * FROM data_cashback");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_terpakai = $r['cashback_global'];
        $total_terpakai[$i] = $d_terpakai;

        $cashback = array_sum($total_terpakai);

    }
} else {
    $q = mysqli_query($conn, "SELECT * FROM data_income_new");
    $i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        $i++;   
        $d_income = $r['income_global'];
        $total_income[$i] = $d_income;

        $hasil_income = array_sum($total_income);

        $d_bogor = $r['income_bogor'];
        $total_bogor[$i] = $d_bogor;

        $hasil_bogor = array_sum($total_bogor);

        $d_a = $r['income_a'];
        $total_a[$i] = $d_a;

        $hasil_a = array_sum($total_a);

        $d_b = $r['income_b'];
        $total_b[$i] = $d_b;

        $hasil_b = array_sum($total_b);

        $d_c = $r['income_c'];
        $total_c[$i] = $d_c;

        $hasil_c = array_sum($total_c);

        $d_d = $r['income_d'];
        $total_d[$i] = $d_d;

        $hasil_d = array_sum($total_d);

        $d_instagram = $r['income_instagram'];
        $total_instagram[$i] = $d_instagram;

        $hasil_instagram = array_sum($total_instagram);

        $income_depok = $hasil_a+$hasil_b+$hasil_c+$hasil_d+$hasil_instagram;

    }
}


?>

<?php if ($linkid_cashback == 'cashback') { ?>
<!-- Program Card Example -->
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Cashback</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($cashback,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
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
                        Income Depok</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($income_depok,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
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
                        Income Bogor</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                        <?= number_format($hasil_bogor,0,"." , ".") ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Income Global
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                Rp. <?= number_format($hasil_income,0,"." , ".") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>