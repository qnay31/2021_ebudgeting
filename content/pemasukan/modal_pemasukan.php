<?php

$id = $_GET["id_pemasukan"];

$id_income = substr($id,10);

// die(var_dump($id_income));


?>

<div class="modal fade" id="pemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Pemasukan <span
                        style="text-transform: capitalize;"><?= $id_income ?></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validasi_income(this)">
                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Divisi
                            </div>
                            <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                            <input type="hidden" name="cabang" value="<?= $_SESSION["cabang"] ?>">
                            <input type="hidden" name="nama" value="<?= $_SESSION["nama"] ?>">
                            <input type="text" class="form-control" name="posisi" value="<?= $posisi ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Kategori
                            </div>
                            <input type="text" class="form-control" name="kategori" style="text-transform: capitalize;"
                                value="<?= $id_income ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Tanggal Pengambilan
                            </div>
                            <input type="date" class="form-control" name="tanggal">
                        </div>


                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Lokasi Pengambilan
                            </div>
                            <input type="text" class="form-control" name="lokasi" placeholder="toko sembako / gedung"
                                id="alpabet" style="text-transform: capitalize;" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Jumlah Celengan
                            </div>
                            <input type="text" class="form-control" name="jumlah" placeholder="100" id="rupiah"
                                autocomplete="off" onkeypress="return hanyaAngka(event)">
                        </div>

                        <div id="disabledSelect" class="form-text mb-2">
                            Jumlah Income
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                            <input type="text" class="form-control" name="income" id="rupiah2" maxlength="11"
                                placeholder="100.000" onkeypress="return hanyaAngka(event)" autocomplete="off">
                        </div>

                        <div id="disabledSelect" class="form-text mb-2">
                            Lampirkan Foto
                        </div>

                        <div class="file-drop-area">
                            <span class="choose-file-button">Pilih Gambar</span>
                            <span class="file-message">or drag and drop files here</span>
                            <input type="file" name="gambar[]" class="file-input" accept=".jpg,.jpeg,.png" multiple
                                required>
                        </div>
                        <div id="divImageMediaPreview"> </div>

                        <div class="button">
                            <?php if ($id_income == "celengan") {?>
                            <input type="submit" name="input_celengan" class="btn btn-primary w-100" value="Laporkan">
                            <?php } else { ?>
                            <input type="submit" name="input" class="btn btn-primary w-100" value="Laporkan">
                            <?php }?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">kembali</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>