<?php
include "function.php";
if (isset($_POST['divisi'])) {
    $divisi = $_POST["divisi"];

    $sql = "select * from list_divisi where id_pengurus= '$divisi' ";

    $hasil = mysqli_query($conn, $sql);
    // die(var_dump($hasil));
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {

?>

<?php if($data["id_pengurus"] == "penjemput"){ ?>
<select class="custom-select form-control form-control-select" aria-label="Default select example" name="posisi">
    <option selected value="">Pilih Salah Satu Gedung</option>
    <option value="<?= $data["posisi"] ?> A">Gedung A</option>
    <option value="<?= $data["posisi"] ?> B">Gedung B</option>
    <option value="<?= $data["posisi"] ?> C">Gedung C</option>
    <option value="<?= $data["posisi"] ?> D">Gedung D</option>
</select>
<div class="form-group mt-3">
    <select class="custom-select form-control form-control-select" aria-label="Default select example" name="cabang">
        <option selected value="">Pilih Salah Satu Cabang</option>
        <option value="Bogor">Bogor</option>
        <option value="Depok">Depok</option>
    </select>
</div>
<?php } elseif ($data["id_pengurus"] == "logistik") { ?>
<select class="custom-select form-control form-control-select" aria-label="Default select example" name="posisi">
    <option selected value="">Pilih Salah Satu Gedung</option>
    <option value="<?= $data["posisi"] ?> A">Gedung A</option>
    <option value="<?= $data["posisi"] ?> B">Gedung B</option>
    <option value="<?= $data["posisi"] ?> C">Gedung C</option>
    <option value="<?= $data["posisi"] ?> D">Gedung D</option>
    <option value="<?= $data["posisi"] ?> E">Gedung E</option>
    <option value="<?= $data["posisi"] ?> F">Gedung F</option>
    <option value="<?= $data["posisi"] ?> Instagram">Gedung Instagram</option>
    <option value="<?= $data["posisi"] ?> Management">Gedung Management</option>
    <option value="<?= $data["posisi"] ?> Taman">Gedung Taman</option>
    <option value="<?= $data["posisi"] ?> Bogor">Gedung Bogor</option>
</select>

<div class="form-group mt-3">
    <select class="custom-select form-control form-control-select" aria-label="Default select example" name="cabang">
        <option selected value="">Pilih Salah Satu Cabang</option>
        <option value="Bogor">Bogor</option>
        <option value="Depok">Depok</option>
    </select>
</div>


<?php }else { ?>
<input type="hidden" name="posisi" value="<?= $data["posisi"] ?>">
<select class="custom-select form-control form-control-select" aria-label="Default select example" name="cabang">
    <option selected value="">Pilih Salah Satu Cabang</option>
    <option value="Bogor">Bogor</option>
    <option value="Depok">Depok</option>
</select>
<?php } ?>
<?php
    }
}

?>