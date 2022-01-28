<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Daily Hari Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validasi_input3(this)">
                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Divisi
                            </div>
                            <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                            <input type="hidden" name="cabang" value="<?= $_SESSION["cabang"] ?>">
                            <input type="text" class="form-control" name="posisi" value="<?= $posisi ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Tanggal Aktivitas
                            </div>
                            <input type="date" class="form-control" name="tanggal">
                        </div>

                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Aktivitas
                            </div>
                            <?php if ($pengurus_id == "kepala_humas") { ?>
                            <select class="custom-select" aria-label="Default select example" name="aktivitas">
                                <option selected value="">Pilih Salah Satu Aktivitas</option>
                                <option value="Distribusi Kotak Amal">Distribusi Kotak Amal</option>
                                <option value="Pengambilan Kotak Amal">Pengambilan Kotak Amal</option>
                                <option value="Distribusi Celengan">Distribusi Celengan</option>
                                <option value="Pengambilan Celengan">Pengambilan Celengan</option>
                                <option value="Laporan Keuangan">Laporan Keuangan</option>
                            </select>
                            <?php } elseif ($pengurus_id == "humas") { ?>
                            <select class="custom-select" aria-label="Default select example" name="aktivitas">
                                <option selected value="">Pilih Salah Satu Aktivitas</option>
                                <option value="Distribusi Kotak Amal">Distribusi Kotak Amal</option>
                                <option value="Pengambilan Kotak Amal">Pengambilan Kotak Amal</option>
                                <option value="Distribusi Celengan">Distribusi Celengan</option>
                                <option value="Pengambilan Celengan">Pengambilan Celengan</option>
                            </select>
                            <?php } else { ?>
                            <input type="text" class="form-control" name="aktivitas" placeholder="Kunjungan"
                                id="alpabet" style="text-transform: capitalize;" autocomplete="off">
                            <?php } ?>

                        </div>

                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Deskripsi Aktivitas
                            </div>
                            <input type="text" class="form-control" name="deskripsi"
                                placeholder="Datang Berkunjung Kerumah Yatim" id="alpabet2"
                                style="text-transform: capitalize;" autocomplete="off">
                        </div>

                        <div id="disabledSelect" class="form-text mb-2">
                            Lampirkan Foto Aktifitas
                        </div>

                        <div class="file-drop-area">
                            <span class="choose-file-button">Pilih Gambar</span>
                            <span class="file-message">or drag and drop files here</span>
                            <input type="file" name="gambar[]" class="file-input" accept=".jpg,.jpeg,.png" multiple
                                required>
                        </div>
                        <div id="divImageMediaPreview"> </div>

                        <div class="button">
                            <?php if ($pengurus_id == "ap_pendidikan") { ?>
                            <input type="submit" name="input_ap" class="btn btn-primary w-100" value="Laporkan">
                            <?php } elseif ($pengurus_id == "ap_kesehatan") { ?>
                            <input type="submit" name="input_ap" class="btn btn-primary w-100" value="Laporkan">
                            <?php } else { ?>
                            <input type="submit" name="input" class="btn btn-primary w-100" value="Laporkan">
                            <?php } ?>
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