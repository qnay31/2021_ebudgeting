<div class="row">
    <?php if($pengurus_id == "ketua_yayasan"){ ?>
    <?php
        include '../notif/ketua.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_program") { ?>
    <?php
        include '../notif/kepala_program.php';
    ?>

    <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
    <?php
        include '../notif/kepala_program.php';
    ?>

    <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
    <?php
        include '../notif/kepala_program.php';
    ?>

    <?php } elseif ($pengurus_id == "ap_pendidikan") { ?>
    <?php
        include '../notif/daily/kepala_program.php';
    ?>

    <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
    <?php
        include '../notif/daily/kepala_program.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
    <?php
        include '../notif/kepala_cabang.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php
        include '../notif/kepala_logistik.php';
    ?>

    <?php } elseif ($pengurus_id == "logistik") { ?>
    <?php
        include '../notif/kepala_logistik.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_humas") { ?>
    <?php
        include '../notif/kepala_humas.php';
    ?>

    <?php } elseif ($pengurus_id == "humas") { ?>
    <?php
        include '../notif/kepala_humas.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php
        include '../notif/kepala_logistik.php';
    ?>

    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <?php
        include '../notif/kepala_humas.php';
    ?>

    <?php }else { ?>
    <?php } ?>
</div>