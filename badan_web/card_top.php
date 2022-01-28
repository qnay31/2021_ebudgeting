<div class="row">
    <?php if($pengurus_id == "ketua_yayasan"){ ?>
    <?php
        include '../card_top/card_ketua.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_program") { ?>
    <?php
        include '../card_top/card_program.php';
    ?>

    <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
    <?php
        include '../card_top/card_program.php';
    ?>

    <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
    <?php
        include '../card_top/card_program.php';
    ?>

    <?php } elseif ($pengurus_id == "ap_pendidikan") { ?>
    <?php
        include '../content/daily/report_program.php';
    ?>

    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php
        include '../content/daily/report_program.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
    <?php
        include '../card_top/card_cabang.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php
        include '../card_top/card_logistik.php';
    ?>

    <?php } elseif ($pengurus_id == "logistik") { ?>
    <?php
        include '../card_top/card_logistik.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_humas") { ?>
    <?php
        include '../card_top/card_humas.php';
    ?>

    <?php } elseif ($pengurus_id == "humas") { ?>
    <?php
        include '../card_top/card_humas.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_sekolah") { ?>
    <?php
        include '../card_top/card_sekolah.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php
        include '../card_top/card_income.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <?php
        include '../card_top/card_produksi.php';
    ?>

    <?php }else { ?>
    <?php } ?>
</div>