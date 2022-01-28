<?php

$q  = mysqli_query($conn, "SELECT * FROM log_aktivity ORDER BY `tanggal` DESC");

$s = $q->num_rows;


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Log Activity</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">Log e-Daily</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel-data_daily" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Ip</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Pukul</th>
                                    <th scope="col">Riwayat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $no = 1;
                                        while ($r = $q->fetch_assoc()) {

                                        ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['nama']) ?></td>
                                    <td><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['ip']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tanggal'])); ?></td>
                                    <td style="text-align: center;">
                                        <?= date('H:i:s', strtotime($r['tanggal'])); ?></td>
                                    <td><?= ucwords($r['aktivitas']) ?></td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>