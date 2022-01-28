<?php
// global
$q  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE status = 'Terverifikasi' ORDER BY `tgl_ambil` DESC");
?>
<div id="nav-program">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_income" role="tab" aria-controls="nav-home"
                aria-selected="true">Global</a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_income&id_income=celengan" role="tab"
                aria-controls="nav-profile" aria-selected="false">Celengan</a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_database=database_income&id_income=kotak" role="tab"
                aria-controls="nav-contact" aria-selected="false">Kotak Amal</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <table id="tabel-data_income" class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Lokasi Distribusi</th>
                            <th scope="col">Jml Pengambilan</th>
                            <th scope="col">Income</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Dokumentasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $convert   = convertDateDBtoIndo($r['tgl_ambil']);
                                $bulan     = substr($convert, 2);
                                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                            <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                            <td style="text-align: center;"><?= ucwords($r['kategori']) ?></td>
                            <td style="text-align: center;"><?= $bulan ?></td>
                            <td><?= ucwords($r['lokasi']) ?></td>
                            <td style="text-align: center;"><?= ucwords($r['jumlah']) ?></td>
                            <td style="text-align: center;">Rp. <?= number_format($r['income'],0,"." , ".") ?></td>
                            <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                            <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                    data-id="<?= $r['id']  ?>" data-name="<?= $r['id_pengurus'] ?>"
                                    class="btn btn-primary btn-xs view_data_pemasukan">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="6">Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Modal -->
                <div id="dataModal_pemasukan" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Dokumentasi</h4>
                            </div>
                            <div class="modal-body" id="detail_user_pemasukan">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>