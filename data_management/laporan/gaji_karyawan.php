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

            <?php if ($id_unik2 == $id2 && $status_a2 == 'OK') { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=gaji&id_unik2=<?= $id2 ?>&id_p2=<?= $unik2 ?>"
                role="tab" aria-controls="nav-profile" aria-selected="false">Gaji Karyawan
                <?php if ($a2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $a2 ?></span>
                <?php } ?>
            </a>
            <?php } else { ?>
            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=gaji" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gaji Karyawan
                <?php if ($a2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $a2 ?></span>
                <?php } ?>
            </a>
            <?php } ?>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=aset" role="tab"
                aria-controls="nav-contact" aria-selected="false">Aset Yayasan
                <?php if ($c2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $c2 ?></span>
                <?php } ?>
            </a>

            <a class="nav-link" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=lainnya" role="tab"
                aria-controls="nav-profile" aria-selected="false">Anggaran Lainnya
                <?php if ($g2 > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $g2 ?></span>
                <?php } ?>
            </a>
        </div>
    </nav>
    <?php } ?>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <?php if($id_unik2 == $id2 && $status_a2 == 'OK'){ ?>
                <div id="form">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validasi_input2(this)">
                        <div class="mb-3">
                            <div class="form-text mb-2">
                                Data Anggaran
                            </div>
                            <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                            <input type="hidden" name="id" value="<?= $id_unik2 ?>">
                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Dari</b></span>
                                <input type="text" class="form-control" name="program" value="<?= $program2 ?>"
                                    readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Tgl diajukan</b></span>
                                <input type="text" class="form-control"
                                    value="<?= date('d-m-Y', strtotime($tanggal_12)); ?>" readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Rencana</b></span>
                                <input type="text" class="form-control" name="deskripsi"
                                    value="<?= ucwords($deskripsi2) ?>" readonly>
                            </div>

                            <div class="input-group mb-1">
                                <span class="input-group-text" id="basic-addon1"><b>Dana anggaran</b></span>
                                <input type="text" class="form-control"
                                    value="Rp. <?= number_format($anggaran2,0,"." , ".") ?>" readonly>
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
                                placeholder="laporan gaji periode" id="alpabet" style="text-transform: capitalize;"
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

                        <div class="button">
                            <input type="submit" name="input_gaji" class="btn btn-primary w-100" value="Laporkan">
                        </div>
                    </form>
                </div>
                <?php }else { ?>
                <div class="table-responsive">
                    <div class="text-center">
                        <label for=""><b style="color: black;">Gaji Karyawan</b>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($r = $k2->fetch_assoc()) {
                                $bln       = substr($r['tgl_dibuat'], 5,-3);
                                $anggaran = $r['gaji_karyawan'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++ ?></td>
                                <td style="text-align: center;"><?= ucwords($r['kategori']) ?> <?= $r['cabang'] ?>
                                </td>
                                <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                <td style="text-align: center;">
                                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                                <td><?= ucwords($r['pemakaian']) ?></td>
                                <td style="text-align: center;"><a class="btn btn-primary"
                                        href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_gaji&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Laporan ini mau diedit?!')">Edit</a></td>
                                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                <td style="text-align: center;"><a class="btn btn-danger"
                                        href="../content/hapus/hapus_laporan_gaji.php?id=laporan_logistik&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Laporan ini mau dihapus?!')">Hapus</a></td>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>