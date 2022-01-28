<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM program WHERE laporan = 'Terverifikasi' AND cabang = 'Depok' AND id_pengurus = 'program_kesehatan' AND status = 'OK' ORDER BY `tgl_pemakaian` DESC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php if ($pengurus_id == "kepala_program") { ?>
            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_program&id_program=program_depok" role="tab"
                aria-controls="nav-profile" aria-selected="false">Global</a>
            <a class="nav-link active" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_program&id_program=kes_depok" role="tab"
                aria-controls="nav-contact" aria-selected="false">Kes Dpk</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_program&id_program=pend_depok" role="tab"
                aria-controls="nav-contact" aria-selected="false">Pend Dpk</a>
            <?php } elseif ($pengurus_id == "program_kesehatan" && $_SESSION['cabang'] == "Depok") {?>

            <?php } else { ?>
            <a class="nav-link" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=global_program" role="tab"
                aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=program_depok" role="tab"
                aria-controls="nav-profile" aria-selected="false">Depok</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=program_bogor" role="tab"
                aria-controls="nav-contact" aria-selected="false">Bogor</a>

            <a class="nav-link active" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=kes_depok" role="tab"
                aria-controls="nav-contact" aria-selected="false">Kes Dpk</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=pend_depok" role="tab"
                aria-controls="nav-contact" aria-selected="false">Pend Dpk</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=kes_bogor" role="tab"
                aria-controls="nav-contact" aria-selected="false">Kes Bgr</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_program&id_program=pend_bogor" role="tab"
                aria-controls="nav-contact" aria-selected="false">Pend Bgr</a>
            <?php } ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <table id="tabel-data_laporan_verif" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Program</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Deskripsi Pemakaian</th>
                            <th scope="col">Dana Anggaran</th>
                            <th scope="col">Dana Terpakai</th>
                            <th scope="col">Dana Cashback</th>
                            <th scope="col">Bukti Pemakaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($r = $q->fetch_assoc()) {
                            $convert   = convertDateDBtoIndo($r['tgl_pemakaian']);
                            $bulan     = substr($convert, 2);

                            $anggaran = $r['dana_anggaran'];
                            $terpakai = $r['dana_terpakai'];

                            $sisa = $anggaran - $terpakai;

                        ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= ucwords($r['program']) ?></td>
                            <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                            <td style="text-align: center;"><?= $bulan ?></td>
                            <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                            <td>Rp. <?= number_format($anggaran, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($terpakai, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($sisa, 0, ".", ".") ?></td>
                            <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                    data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_program">
                            </td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="5">Total Cashback</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                    </tfoot>
                </table>
                <!-- Modal -->
                <div id="dataModal_program" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Bukti Kwitansi</h4>
                            </div>
                            <div class="modal-body" id="detail_user_program">
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