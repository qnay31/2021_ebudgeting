<!-- program depok -->
<?php if($pengurus_id == "kepala_logistik"){ ?>

<?php if ($linkid_logistik == 'produksi') { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Grafik Produksi Bogor 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_produksi_bogor"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } elseif ($linkid_logistik == 'baksos') { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Grafik Bakti Sosial 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chart_content_ketua_yayasan_baksos"></canvas>
            </div>
        </div>
    </div>
</div>

<?php } elseif ($linkid_logistik == 'maintenance') { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Maintenance 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_maintenance_global"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Logistik 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_content_ketua_yayasan_logistik"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php } elseif ($posisi == 'Logistik Gedung Management' && $_SESSION['cabang'] == "Depok") { ?>
<div class="col-xl-6 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Grafik Logistik 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_content_ketua_yayasan_logistik"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Gaji Karyawan 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_gaji_global"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Grafik Aset Yayasan 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_aset_global"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-warning">Grafik Biaya Lainnya 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_lainnya_global"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- logistik depok -->
<?php } elseif ($pengurus_id == "logistik" && $_SESSION['cabang'] == "Depok") {?>

<?php if ($linkid_taman == "operasional_yayasan") { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-danger">Grafik Operasional Yayasan 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_operasional_global"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Logistik 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_logistik_depok"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- logistik bogor -->
<?php } else { ?>
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Logistik 2021</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartarea_logistik_bogor"></canvas>
            </div>
        </div>
    </div>
</div>
<?php } ?>