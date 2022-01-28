<?php
include "../function.php";
if (isset($_POST['produksi'])) {
    $divisi = $_POST["produksi"];
?>

<?php if ($divisi == "Gedung") { ?>
<input type="hidden" name="jenis" value="Maintenance">
<?php } else { ?>
<input type="hidden" name="jenis" value="Maintenance">
<?php } ?>


<?php } ?>