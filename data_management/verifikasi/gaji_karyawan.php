<div id="nav-program">
    <?php if ($posisi == 'Logistik Gedung Management') { ?>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link" id="nav-home-tab" href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik"
                role="tab" aria-controls="nav-home" aria-selected="true">Logistik
                <?php if ($s > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $s ?></span>
                <?php } ?>
            </a>

            <a class="nav-link active" id="nav-profile-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=gaji" role="tab"
                aria-controls="nav-profile" aria-selected="false">Gaji Karyawan
                <?php if ($a > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $a ?></span>
                <?php } ?>
            </a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=aset" role="tab"
                aria-controls="nav-contact" aria-selected="false">Aset Yayasan
                <?php if ($aset > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $aset ?></span>
                <?php } ?>
            </a>

            <a class="nav-link" id="nav-contact-tab"
                href="<?= $_SESSION["username"] ?>.php?id_input=verifikasi_logistik&id_management=lainnya" role="tab"
                aria-controls="nav-contact" aria-selected="false">Anggaran Lainnya
                <?php if ($aln > 0) { ?>
                <span class="badge badge-danger badge-counter"><?= $aln ?></span>
                <?php } ?>
            </a>
        </div>
    </nav>
    <?php } ?>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-global" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            <div class="table-responsive">
                <div class="text-center">
                    <label for=""><b style="color: black;">Gaji Karyawan</b>
                        <hr>
                    </label>
                </div>
                <table id="tabel-data_verifikasi" class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Diajukan</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Tgl Pengajuan</th>
                            <th scope="col">Rencana</th>
                            <th scope="col">Status Admin</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Anggaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no = 1;
                                while ($r = $k->fetch_assoc()) {
                                $bln       = substr($r['tgl_dibuat'], 5,-3);
                                ?>

                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= ucwords($r['kategori']) ?> <?= $r['cabang'] ?></td>
                            <td><?= ucwords($r['nama']) ?></td>
                            <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                            <td style="text-align: center;">
                                <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                            <td><?= ucwords($r['deskripsi']) ?></td>
                            <td style="text-align: center;"><b><?= ucwords($r['status']) ?></b></td>
                            <?php if($r['status'] == "OK"){ ?>
                            <td style=" text-align: center;">
                                <a class="btn btn-success"
                                    href="<?= $_SESSION["username"] ?>.php?id_input=laporan_logistik&id_management=gaji&id_unik2=<?= $r['id'] ?>&id_p2=<?= $bln ?>"
                                    onclick="return confirm('Semua tugas selesai, siap laporkan !!')">Laporan</a>
                            </td>
                            <?php } elseif ($r['status_b'] == "OK") { ?>
                            <td style=" text-align: center;" class="disabled">
                                <a class="btn btn-success disable" href="">Laporan</a>
                            </td>
                            <?php } else { ?>
                            <td style=" text-align: center;"><a class="btn btn-primary"
                                    href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_gaji&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                    onclick="return confirm('Yakin anggaran ini mau diedit?!')">Edit</a> | <a
                                    class="btn btn-danger"
                                    href="../content/hapus/hapus_gaji.php?id=verifikasi_logistik&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                    onclick="return confirm('Yakin anggaran ini mau dihapus?!')">Hapus</a>
                            </td>
                            <?php } ?>
                            <td>Rp. <?= number_format($r['gaji_karyawan'],0,"." , ".") ?></td>
                        </tr>

                        <?php     
                                }
                                ?>
                    </tbody>
                    <tfoot>
                        <tr style="text-align: center;">
                            <th colspan="8">Total</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>