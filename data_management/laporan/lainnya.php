<div id="nav-program">
    <?php if ($posisi == 'Logistik Gedung Management') { ?>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link" id="nav-home-tab" href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik"
                role="tab" aria-controls="nav-home" aria-selected="true">Logistik
                <?php if ($s2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                <?php } ?>
            </a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=gaji" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gaji Karyawan
                <?php if ($a2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $a2 ?></span>
                <?php } ?>
            </a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=aset" role="tab"
                aria-controls="nav-contact" aria-selected="false">Aset Yayasan
                <?php if ($c2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $c2 ?></span>
                <?php } ?>
            </a>

            <?php if ($id_unik5 == $id5 && $status_a5 == 'OK') { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=lainnya&id_unik5=<?= $id5 ?>&id_p5=<?= $unik5 ?>"
                role="tab" aria-controls="nav-profile" aria-selected="false">Anggaran Lainnya
                <?php if ($g2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $g2 ?></span>
                <?php } ?>
            </a>
            <?php } else { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=lainnya" role="tab"
                aria-controls="nav-profile" aria-selected="false">Anggaran Lainnya
                <?php if ($g2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $g2 ?></span>
                <?php } ?>
            </a>
            <?php } ?>
        </div>
    </nav>
    <?php } ?>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <?php if($id_unik5 == $id5 && $status_a5 == 'OK'){ ?>
                <div id="form">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validasi_input2(this)">
                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Data Anggaran
                            </div>
                            <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                            <input type="hidden" name="id" value="<?= $id_unik5 ?>">
                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Dari</b></span>
                                <input type="text" class="form-control" name="program" value="<?= $program5 ?>"
                                    readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Tgl diajukan</b></span>
                                <input type="text" class="form-control"
                                    value="<?= date('d-m-Y', strtotime($tanggal_15)); ?>" readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Rencana</b></span>
                                <input type="text" class="form-control" name="deskripsi"
                                    value="<?= ucwords($deskripsi5) ?>" readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Dana anggaran</b></span>
                                <input type="text" class="form-control"
                                    value="Rp. <?= number_format($anggaran5,0,"." , ".") ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Tanggal Laporan
                            </div>
                            <input type="date" class="form-control" name="tanggal_laporan">
                        </div>
                        <div class="mb-3">
                            <div id="disabledSelect" class="form-text mb-2">
                                Deskripsi Pemakaian
                            </div>
                            <input type="text" class="form-control" name="deskripsi_laporan"
                                placeholder="laporan anggaran lainnya" id="alpabet" style="text-transform: capitalize;"
                                autocomplete="off">
                            <!-- <div id="drag-drop-area"></div> -->
                        </div>

                        <div id="disabledSelect" class="form-text mb-2">
                            Dana Terpakai
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
                            <input type="text" class="form-control" name="dana_laporan" id="rupiah" maxlength="11"
                                placeholder="Nominal" onkeypress="return hanyaAngka(event)" autocomplete="off">
                        </div>

                        <div class="file-drop-area">
                            <span class="choose-file-button">Pilih Gambar</span>
                            <span class="file-message">or drag and drop files here</span>
                            <input type="file" name="gambar[]" class="file-input" accept=".jpg,.jpeg,.png" multiple
                                required>
                        </div>
                        <div id="divImageMediaPreview"> </div>

                        <div class="button">
                            <input type="submit" name="input_lainnya" class="btn btn-primary w-100" value="Laporkan">
                        </div>
                    </form>
                </div>
                <?php }else { ?>
                <div class="table-responsive">
                    <div class="text-center">
                        <label for=""><b style="color: black;">Laporan Anggaran Lainnya</b>
                            <hr>
                        </label>
                    </div>
                    <table id="tabel-data_laporan" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Dilaporkan</th>
                                <th scope="col">Tgl laporan</th>
                                <th scope="col">Pemakaian</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Anggaran</th>
                                <th scope="col">Terpakai</th>
                                <th scope="col">Cashback</th>
                                <th scope="col">Action</th>
                                <th scope="col">Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($r = $f2->fetch_assoc()) {
                                $bln       = substr($r['tgl_dibuat'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++ ?></td>
                                <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                                </td>
                                <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                <td style="text-align: center;">
                                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                                <td><?= ucwords($r['pemakaian']) ?></td>
                                <td style="text-align: center;"><a class="btn btn-primary"
                                        href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_lainnya&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Laporan ini mau diedit?!')">Edit</a></td>
                                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                <td style="text-align: center;"><a class="btn btn-danger"
                                        href="../content/hapus/hapus_laporan_lainnya.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Laporan ini mau dihapus?!')">Hapus</a></td>
                                <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                        data-id="<?= $r['id']  ?>" class="btn btn-dark btn-xs view_data_lain">
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th colspan="6">Total Cashback</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Modal -->
                    <div id="dataModal_lain" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bukti Kwitansi</h4>
                                </div>
                                <div class="modal-body" id="detail_user_lain">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>