<?php
include "../function.php";
if (isset($_POST['management'])) {
    $divisi = $_POST["management"];
?>

<?php if ($divisi == "Gaji Karyawan") { ?>

<select class="custom-select" aria-label="Default select example" name="g_cabang" id="management" required>
    <option selected value="">Pilih Salah Satu Cabang</option>
    <option value="Bogor">Bogor</option>
    <option value="Depok">Depok</option>
</select>

<?php } elseif ($divisi == "Uang Makan") { ?>
<select class="custom-select" aria-label="Default select example" name="g_cabang" id="management" required>
    <option selected value="">Pilih Salah Satu Cabang</option>
    <option value="Bogor">Bogor</option>
    <option value="Depok">Depok</option>
</select>

<?php } elseif ($divisi == "Aset Yayasan") { ?>
<select class="custom-select" aria-label="Default select example" name="jenis" id="management" required
    oninvalid="this.setCustomValidity('Pilih salah satu dari jenis pembelian')" oninput="this.setCustomValidity('')">
    <option selected value="">Pilih Salah Satu Jenis Aset</option>
    <option value="Pembelian Barang">Pembelian Barang</option>
    <option value="Pembangunan Gedung">Pembangunan Gedung</option>
</select>

<div class="input-group mt-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01"><b>Qty</b></label>
    </div>
    <input type="text" name="qty" id="rupiah2" class="form-control" onkeypress="return hanyaAngka(event)"
        autocomplete="off" placeholder="Qty Perencanaan: 10" required
        oninvalid="this.setCustomValidity('Masukkan Qty Perencanaan')" oninput="this.setCustomValidity('')">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01"><b>Pcs</b></label>
    </div>
</div>

<script>
var rupiah2 = document.getElementById('rupiah2');
rupiah2.addEventListener('keyup', function() {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah2(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
</script>

<?php } else { ?>

</select>
<?php } ?>


<?php } ?>