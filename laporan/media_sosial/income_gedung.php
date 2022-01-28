<?php

$gedung = $_GET["id_gedung"];
// global
$q  = mysqli_query($conn, "SELECT * FROM income WHERE gedung ='$gedung' AND status = 'Terverifikasi' ORDER BY `tgl_pemasukan` DESC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link" id="nav-home-tab" href="<?= $_SESSION["username"] ?>.php?id_database=harian_media"
                role="tab" aria-controls="nav-home" aria-selected="true">Global</a>

            <?php if ($gedung == "A") { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=A" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung A</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=A" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung A</a>
            <?php } ?>

            <?php if ($gedung == "B") { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=B" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung B</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=B" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung B</a>
            <?php } ?>

            <?php if ($gedung == "Instagram") { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=Instagram" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung Instagram</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=Instagram" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung Instagram</a>
            <?php } ?>

            <?php if ($gedung == "Bogor") { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=Bogor" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung Bogor</a>
            <?php } else { ?>
            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=harian_media&id_gedung=Bogor" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gedung Bogor</a>
            <?php } ?>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <table id="tabel-data_harian_income" class="table table-striped table-bordered nowrap">
                    <p style="text-align: center;"><b>Pemasukan Harian Gedung <?= $gedung ?></b></p>
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Gedung</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($r = $q->fetch_assoc()) {
                            $convert   = convertDateDBtoIndo($r['tgl_pemasukan']);
                        ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= ucwords($r['kategori']) ?></td>
                            <td>Gedung <?= ucwords($r['gedung']) ?></td>
                            <td><?= $convert ?></td>
                            <td>Rp. <?= number_format($r['income'], 0, ".", ".") ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="4">Total Income</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>