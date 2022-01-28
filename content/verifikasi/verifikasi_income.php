<?php
// notif

$q  = mysqli_query($conn, "SELECT * FROM income WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'Menunggu Verifikasi' ORDER BY `tgl_pemasukan` DESC");

$s = $q->num_rows;

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_input=input_income"><small>Income</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_income"></i><small
                                class="text-white">Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <label for=""><b>Menunggu Verifikasi:</b>
                        <hr>
                    </label>
                    <div class="table-responsive">
                        <table id="tabel-data_verifikasi" class="table table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Gedung</th>
                                    <th scope="col">Tgl Pemasukan</th>
                                    <th scope="col">Status Admin</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                    <th scope="col">Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_pemasukan'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                                    <td>Gedung <?= ucwords($r['gedung']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemasukan'])); ?></td>
                                    <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                                    <td style=" text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_income&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Data Income Gedung <?= ucwords($r['gedung']) ?> Mau diubah?!')">Edit</a>
                                    </td>
                                    <td style=" text-align: center;"><a class="btn btn-danger"
                                            href="../content/hapus/hapus_income.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin data pemasukan gedung <?= ucwords($r['gedung']) ?> ini mau dihapus?!')">Hapus</a>
                                    </td>
                                    <td>Rp. <?= number_format($r['income'],0,"." , ".") ?></td>
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