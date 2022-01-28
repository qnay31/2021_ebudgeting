<?php
$q  = mysqli_query($conn, "SELECT * FROM program WHERE program = 'Operasional Program' AND laporan = 'Terverifikasi' ORDER BY `tgl_pengajuan` DESC");
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_admin=<?= $id_admin ?>"></i><small
                                class="text-white">Ubah Database <?= ucwords($id_admin) ?>&nbsp;</small>
                        </a></li>

                    <li class="page-item"><a class="page-link "
                            href="<?= $_SESSION["username"] ?>.php?id_ubah=<?= $id_admin ?>"></i><small>Ubah Akun
                                <?= ucwords($id_admin) ?>&nbsp;</small>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel-data_ubah_laporan" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Perencanaan</th>
                                    <th scope="col">Dana Anggaran</th>
                                    <th scope="col">Tanggal Laporan</th>
                                    <th scope="col">Deskripsi Pemakaian</th>
                                    <th scope="col">Dana Terpakai</th>
                                    <th scope="col">Dana Cashback</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                    $anggaran = $r['dana_anggaran'];
                                    $terpakai = $r['dana_terpakai'];
                                    $sisa = $anggaran - $terpakai;
                                    $bln       = substr($r['tgl_pemakaian'], 5,-3);
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= ucwords($r['program']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                                    <td><?= ucwords($r['deskripsi']) ?></td>
                                    <td>Rp. <?= number_format($anggaran, 0, ".", ".") ?></td>
                                    <td style="text-align: center;">
                                        <?php if ($r["tgl_pemakaian"] == "0000-00-00") { ?>
                                        -
                                        <?php } else { ?>
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?>
                                        <?php } ?>
                                    </td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <td>Rp. <?= number_format($terpakai, 0, ".", ".") ?></td>
                                    <td>Rp. <?= number_format($sisa, 0, ".", ".") ?></td>
                                    <td style=" text-align: center;">
                                        <!-- <?php if ($r["laporan"] == "Terverifikasi") { ?>
                                        <a class="btn btn-success"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_admin=<?= $id_admin ?>&id_admin_edit=status_<?= $id_admin ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Ubah Status</a>
                                        <?php } else { ?>
                                        <a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_admin=<?= $id_admin ?>&id_admin_edit=edit_<?= $id_admin ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a>
                                        <?php if ($r["status"] == "") { ?>
                                        ||
                                        <a class="btn btn-danger"
                                            href="../content/hapus/hapus_admin.php?id_hapus=<?= $id_admin ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau dihapus?!')">Hapus</a>
                                        <?php } ?>
                                        <?php } ?> -->
                                        <a class="btn btn-danger"
                                            href="../content/pindah/move.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin anggaran ini mau dipindah?!')">Pindahkan
                                            Data</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="5">Total</th>
                                    <th></th>
                                    <th colspan="2"></th>
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
</div>