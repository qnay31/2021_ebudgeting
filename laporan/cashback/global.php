<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM data_cashback ORDER BY `id` ASC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php if ($linkid_cashback == '') { ?>
            <a class="nav-link active" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_cashback" role="tab" aria-controls="nav-home"
                aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=global_cashback&id_cashback=rincian" role="tab"
                aria-controls="nav-profile" aria-selected="false">Rincian Cashback</a>
            <?php } else { ?>
            <a class="nav-link active" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_link_cashback=cashback&id_database=global_cashback" role="tab"
                aria-controls="nav-home" aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
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
                    <label for=""><b style="color: black;">Tabel Cashback Yayasan Global 2021</b>
                        <hr>
                    </label>
                </div>
                <table id="tabel-data_cashback_global" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Cashback Global</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($r = $q->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: center;"><?= ucwords($r['bulan']) ?> <?= $r['tahun'] ?></td>
                            <td>Rp. <?= number_format($r['cashback_global'], 0, ".", ".") ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="2">Total</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>