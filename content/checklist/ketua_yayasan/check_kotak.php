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
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_kotak"></i><small
                                class="text-white">Kotak
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

                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_pemasukan=check_cashback"></i><small>Media
                                Sosial&nbsp;</small>

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
                    <label for=""><b>Checklist Kotak Amal :</b>
                        <hr>
                    </label>
                    <div class="table-responsive">

                        <!-- program -->
                        <div class="text-center">
                            <label for=""><b style="color: black;">Income Kotak Amal</b>
                                <hr>
                            </label>
                        </div>
                        <table id="tabel-data_income" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tanggal Pengambilan</th>
                                    <th scope="col">Lokasi Distribusi</th>
                                    <th scope="col">Jml Kotak
                                    </th>
                                    <th scope="col">Income</th>
                                    <th scope="col">Pengaturan</th>
                                    <th scope="col">Dokumentasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                    $bln       = substr($r['tgl_ambil'], 5,-3);
                                    $convert   = convertDateDBtoIndo($r['tgl_ambil']);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= $convert ?></td>
                                    <td><?= ucwords($r['lokasi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['jumlah']) ?></td>
                                    <td style="text-align: center;">Rp. <?= number_format($r['income'],0,"." , ".") ?>
                                    </td>
                                    <td style=" text-align: center;"> <a class="btn btn-success"
                                            href="../admin/verif_pemasukan.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Anda Yakin Konfirmasi ini ?')">Konfirmasi</a>
                                    </td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" data-name="<?= $r['id_pengurus'] ?>"
                                            class="btn btn-primary btn-xs view_data_pemasukan">
                                    </td>
                                </tr>

                                <?php     
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="6">Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_pemasukan" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Dokumentasi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_pemasukan">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>