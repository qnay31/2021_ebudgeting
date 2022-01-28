<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM cashback WHERE status = 'Terverifikasi' ORDER BY `tgl_cashback` DESC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php if ($linkid_cashback == '') { ?>
            <a class="nav-link" id="nav-home-tab" href="<?= $_SESSION["username"] ?>.php?id_database=global_cashback"
                role="tab" aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_cashback&id_cashback=rincian" role="tab"
                aria-controls="nav-profile" aria-selected="false">Rincian Cashback</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_cashback=cashback&id_database=global_cashback" role="tab"
                aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_cashback=cashback&id_database=global_cashback&id_cashback=rincian"
                role="tab" aria-controls="nav-profile" aria-selected="false">Rincian Cashback</a>
            <?php } ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <div class="text-center">
                    <label for=""><b style="color: black;">Tabel Rincian Cashback Yayasan 2021</b>
                        <hr>
                    </label>
                </div>
                <table id="tabel-data_cashback_verif" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Dilaporkan</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Cashback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            while ($r = $q  ->fetch_assoc()) {
                            ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                            </td>
                            <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                            <td style="text-align: center;">
                                <?= date('d-m-Y', strtotime($r['tgl_cashback'])); ?></td>
                            <td><?= ucwords($r['deskripsi']) ?></td>
                            <td>Rp. <?= number_format($r['cashback'],0,"." , ".") ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="5">Total Cashback</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>