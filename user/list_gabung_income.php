<?php
include "../function.php";
if (isset($_POST['gedung'])) {
    $divisi = $_POST["gedung"];
?>

<?php if ($divisi == "A") { ?>
<input type="text" class="form-control" name="gabung_gedung" value="B" readonly>

<div class="button mt-3">
    <input type="submit" name="input" class="btn btn-primary w-100" value="Gabungkan"
        onclick="return confirm('Data income gedung A akan digabungkan dengan income gedung B. Apakah sudah yakin?')">
</div>
<?php } elseif ($divisi == "B") { ?>
<input type="text" class="form-control" name="gabung_gedung" value="A" readonly>

<div class="button mt-3">
    <input type="submit" name="input" class="btn btn-primary w-100" value="Gabungkan"
        onclick="return confirm('Data income gedung B akan digabungkan dengan income gedung A. Apakah sudah yakin?')">
</div>
<?php } elseif ($divisi == "C") { ?>
<input type="text" class="form-control" name="gabung_gedung" value="D" readonly>

<div class="button mt-3">
    <input type="submit" name="input" class="btn btn-primary w-100" value="Gabungkan"
        onclick="return confirm('Data income gedung C akan digabungkan dengan income gedung D. Apakah sudah yakin?')">
</div>

<?php } else { ?>
<input type="text" class="form-control" name="gabung_gedung" value="C" readonly>

<div class="button mt-3">
    <input type="submit" name="input" class="btn btn-primary w-100" value="Gabungkan"
        onclick="return confirm('Data income gedung D akan digabungkan dengan income gedung C. Apakah sudah yakin?')">
</div>
<?php } ?>


<?php } ?>