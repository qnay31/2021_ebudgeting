<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM data_produksi ORDER BY `id` ASC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php if ($linkid_logistik ==  "") { ?>
            <a class="nav-link active" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi" role="tab" aria-controls="nav-home"
                aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi&id_produksi=depok" role="tab"
                aria-controls="nav-profile" aria-selected="false">Depok</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi&id_produksi=bogor" role="tab"
                aria-controls="nav-contact" aria-selected="false">Bogor</a>
            <?php } else { ?>
            <a class="nav-link active" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_produksi"
                role="tab" aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_produksi&id_produksi=depok"
                role="tab" aria-controls="nav-profile" aria-selected="false">Depok</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_produksi&id_produksi=bogor"
                role="tab" aria-controls="nav-contact" aria-selected="false">Bogor</a>
            <?php } ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <div class="text-center">
                    <label for=""><b style="color: black;">Tabel Produksi Global 2021</b>
                        <hr>
                    </label>
                </div>
                <table id="tabel-data_gaji_global" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Produksi Anggaran Depok</th>
                            <th scope="col">Produksi Terpakai Depok</th>
                            <th scope="col">Produksi Anggaran Bogor</th>
                            <th scope="col">Produksi Terpakai Bogor</th>
                            <th scope="col">Produksi Anggaran Global</th>
                            <th scope="col">Produksi Terpakai Global</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($r = $q->fetch_assoc()) {
                        ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= ucwords($r['bulan']) ?> <?= $r['tahun'] ?></td>
                            <td>Rp. <?= number_format($r['anggaran_produksi_depok'], 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($r['terpakai_produksi_depok'], 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($r['anggaran_produksi_bogor'], 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($r['terpakai_produksi_bogor'], 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($r['anggaran_global'], 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($r['terpakai_global'], 0, ".", ".") ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="2">Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
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