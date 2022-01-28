<?php if($pengurus_id == "ketua_yayasan"){ ?>
<?php
        include '../grafik/chart_ketua.php';
    ?>
<?php } elseif ($pengurus_id == "kepala_program") { ?>

<?php
        include '../grafik/chart_program.php';
    ?>

<?php } elseif ($pengurus_id == "program_kesehatan") { ?>
<?php
        include '../grafik/chart_program.php';
    ?>

<?php } elseif ($pengurus_id == "program_pendidikan") { ?>
<?php
        include '../grafik/chart_program.php';
    ?>

<?php } elseif ($pengurus_id == "kepala_cabang") { ?>
<?php
        include '../grafik/chart_program.php';
    ?>

<?php } elseif ($pengurus_id == "kepala_logistik") { ?>
<?php
        include '../grafik/chart_logistik.php';
    ?>

<?php } elseif ($pengurus_id == "logistik") { ?>
<?php
        include '../grafik/chart_logistik.php';
    ?>

<?php } elseif ($pengurus_id == "kepala_humas") { ?>
<?php
        include '../grafik/chart_humas.php';
    ?>

<?php } elseif ($pengurus_id == "humas") { ?>
<?php
        include '../grafik/chart_humas.php';
    ?>

<?php } elseif ($pengurus_id == "kepala_income") { ?>
<?php
        include '../grafik/chart_income.php';
    ?>

<?php } elseif ($pengurus_id == "kepala_produksi") { ?>
<?php
        include '../grafik/chart_produksi.php';
    ?>

<?php } else { ?>

<?php } ?>