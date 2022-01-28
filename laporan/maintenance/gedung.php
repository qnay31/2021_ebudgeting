<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM maintenance WHERE laporan = 'Terverifikasi' AND maintenance = 'Gedung' ORDER BY `tgl_pemakaian` DESC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php if ($linkid_logistik ==  "") { ?>
            <a class="nav-link" id="nav-home-tab" href="<?= $_SESSION["username"] ?>.php?id_database=global_maintenance"
                role="tab" aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_maintenance&id_maintenance=aset" role="tab"
                aria-controls="nav-profile" aria-selected="false">Aset</a>

            <a class="nav-link active" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_maintenance&id_maintenance=gedung" role="tab"
                aria-controls="nav-contact" aria-selected="false">Gedung</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_maintenance"
                role="tab" aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_maintenance&id_maintenance=aset"
                role="tab" aria-controls="nav-profile" aria-selected="false">Aset</a>

            <a class="nav-link active" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_maintenance&id_maintenance=gedung"
                role="tab" aria-controls="nav-contact" aria-selected="false">Gedung</a>
            <?php } ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <div class="text-center">
                    <label for=""><b style="color: black;">Tabel Maintenance Gedung 2021</b>
                        <hr>
                    </label>
                </div>
                <table id="tabel-data_lap_produksi" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Dilaporkan</th>
                            <th scope="col">Tgl Pengajuan</th>
                            <th scope="col">Untuk Rencana</th>
                            <th scope="col">Anggaran</th>
                            <th scope="col">Tgl laporan</th>
                            <th scope="col">Pemakaian</th>
                            <th scope="col">Terpakai</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cashback</th>
                            <th scope="col">Resi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_pemakaian'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                                <?= ucwords($r['maintenance']) ?>
                            </td>
                            <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                            <td style="text-align: center;">
                                <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                            <td><?= ucwords($r['perencanaan']) ?></td>
                            <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                            <td style="text-align: center;">
                                <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                            <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                            <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                            <td style=" text-align: center;"><?= $r['laporan'] ?>
                            </td>
                            <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                            <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                    data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_maintenance">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="5">Total Anggaran</th>
                            <th></th>
                            <th colspan="2">Total Pemakaian</th>
                            <th></th>
                            <th colspan="1">Total Cashback</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Modal -->
                <div id="dataModal_maintenance" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Bukti Kwitansi</h4>
                            </div>
                            <div class="modal-body" id="detail_user_maintenance">
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