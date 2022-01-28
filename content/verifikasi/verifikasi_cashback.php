<?php
// notif

$q  = mysqli_query($conn, "SELECT * FROM cashback WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND status = 'Menunggu Verifikasi' ORDER BY `tgl_cashback` DESC");

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
                            href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_input=input_cashback"><small>Cashback</small>
                        </a></li>
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_input=verifikasi_cashback"></i><small
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
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tgl Cashback</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                    <th scope="col">Cashback</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_cashback'], 5,-3);
                                ?>

                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">Dana <?= ucwords($r['kategori']) ?></td>
                                    <td><?= ucwords($r['posisi']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_cashback'])); ?></td>
                                    <td style="text-align: center;">
                                        <?= ucwords($r['deskripsi']) ?>
                                    </td>
                                    <td style=" text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_cashback=<?= $linkid_cashback ?>&id_edit=edit_cashback&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Data dana cashback Mau diubah?!')">Edit</a>
                                    </td>
                                    <td style=" text-align: center;"><a class="btn btn-danger"
                                            href="../content/hapus/hapus_cashback.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin data dana cashback ini mau dihapus?!')">Hapus</a>
                                    </td>
                                    <td>Rp. <?= number_format($r['cashback'],0,"." , ".") ?></td>
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