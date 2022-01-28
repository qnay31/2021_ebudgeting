<?php

// celengan
$q = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = 'celengan' AND status = 'Pending' ORDER BY `tgl_ambil` DESC ");

$s = $q->num_rows;

// kotak amal
$q2 = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = 'kotak amal' AND status = 'Pending' ORDER BY `tgl_ambil` DESC ");

$s2 = $q2->num_rows;

// income media sosial
$q3 = mysqli_query($conn, "SELECT * FROM income WHERE status = 'Menunggu Verifikasi' ORDER BY `tgl_pemasukan` DESC ");

$s3 = $q3->num_rows;

// Cashback
$q4 = mysqli_query($conn, "SELECT * FROM cashback WHERE status = 'Menunggu Verifikasi' ORDER BY `tgl_cashback` DESC ");

$s4 = $q4->num_rows;


?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_celengan">
                            <small>Celengan&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_kotak"></i><small>Kotak
                                Amal&nbsp;</small>

                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_income"></i><small>Media
                                Sosial&nbsp;</small>
                            <?php if($s3 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s3 ?></span>
                            <?php } ?>
                        </a></li>

                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_cashback"></i><small
                                class="text-white">Media Sosial&nbsp;</small>

                            <?php if($s4 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s4 ?></span>
                            <?php } ?>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Checklist Cashback :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">

                        <!-- program -->
                        <div class="text-center">
                            <label for=""><b style="color: black;">Cashback Yayasan</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_cashback" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tgl Cashback</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Cashback</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q4->fetch_assoc()) {
                                $bln       = substr($r['tgl_cashback'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_cashback'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['status']) ?></td>
                                    <td style=" text-align: center;"><a class="btn btn-success"
                                            href="../admin/verif_cashback.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Konfirmasi <?= ucwords($r['deskripsi']) ?>?!')">Konfirmsi</a>
                                    </td>
                                    <td style=" text-align: center;">Rp.
                                        <?= number_format($r['cashback'],0,"." , ".") ?>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="8">Total</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>