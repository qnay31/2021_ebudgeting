<?php

$q = mysqli_query($conn, "SELECT akun_pengurus.id_pengurus, akun_pengurus.nama, akun_pengurus.cabang, akun_pengurus.profil, akun_pengurus.password, akun_pengurus.posisi, list_divisi.akses 
    FROM akun_pengurus
    JOIN list_divisi ON list_divisi.id_pengurus = akun_pengurus.id_pengurus WHERE list_divisi.akses = 'logistik' ORDER BY `nama` ASC ");

    $s = $q->num_rows;

?>

<div class="container">
    <div>
        <a class="btn btn-default filter-button" href="<?= $_SESSION["username"] ?>.php?id_data=pengurus">All</a>
        <a class="btn btn-default filter-button"
            href="<?= $_SESSION["username"] ?>.php?id_data=pengurus&id_list=program">Program</a>
        <a class="btn btn-primary filter-button"
            href="<?= $_SESSION["username"] ?>.php?id_data=pengurus&id_list=logistik">Logistik</a>
        <a class="btn btn-default filter-button"
            href="<?= $_SESSION["username"] ?>.php?id_data=pengurus&id_list=humas">Humas</a>
    </div>
    <br>
    <p>Total Pengurus: <b><?= $s ?></b></p>
    <br>
    <div class="row text-center">

        <!-- Team item -->
        <?php
        $no = 1;
        while ($r = $q->fetch_assoc()) {
        ?>
        <div class="col-xl-3 col-sm-6 mb-5 bg-profil">
            <div class="bg-white rounded shadow-sm py-5 px-4 bg-card">
                <div class="layer-top"></div>
                <div class="layer"></div>
                <img src="../img/profil/thump_<?= $r['profil'] ?>" alt="" width="100"
                    class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 nama-pengurus"><b><?= ucwords($r['nama']) ?></b></h5><span
                    class="small text-uppercase text-muted posisi-pengurus"><?= ucwords($r['posisi']) ?></span>
                <ul class="social mb-0 list-inline mt-3">
                    <?php if ($r["id_pengurus"] == 'ketua_yayasan') { ?>
                    <li class="list-inline-item">
                    </li>
                    <?php } else { ?>
                    <li class="list-inline-item"><a
                            href="../content/hapus/hapus_akun.php?id_unik=<?= $r['id'] ?>&key=<?= $r['password'] ?>"
                            class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i
                                class="far fa-trash-alt"></i></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- End -->
        <?php } ?>
    </div>
</div>