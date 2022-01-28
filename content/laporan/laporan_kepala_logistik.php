<?php

// require 'function.php';

if ($pengurus_id == 'kepala_produksi') {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(laporan_kepala_logistik($_POST) > 0 ) {
            echo "<script>
                    alert('Data Laporan Berhasil diproses');
                    document.location.href = '$link.php?id_input=laporan_produksi';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }
} else {
    if (isset($_POST["input"]) ) {
        $link = $_SESSION["username"];
        if(laporan_kepala_logistik($_POST) > 0 ) {
            echo "<script>
                    alert('Data Laporan Berhasil diproses');
                    document.location.href = '$link.php?id_link_logistik=$linkid_logistik&id_input=laporan_$linkid_logistik';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    
    
    }
}

// notif

if ($pengurus_id == 'kepala_produksi') {
    $q  = mysqli_query($conn, "SELECT * FROM produksi WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");
        
        $s = $q->num_rows;
        
        
        $q2  = mysqli_query($conn, "SELECT * FROM produksi WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status = 'OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan` DESC");
        
        $s2 = $q2->num_rows;
        // die(var_dump($s2));
        
        $id     = $_GET["id_unik"];
        $unik   = $_GET["id_p"];
        
        $query  = mysqli_query($conn, "SELECT * FROM produksi WHERE id = '$id' AND MONTH(tgl_pengajuan) = '$unik' ");
        
        $data               = mysqli_fetch_assoc($query);
        $id_unik            = $data["id"];
        $nama               = $data["nama"];
        $laporan            = $data["laporan"];
        $program            = $data["produksi"];
        $jenis              = $data["jenis"];
        $cabang             = $data["cabang"];
        $qty                = $data["qty_anggaran"];
        $tanggal_1          = $data["tgl_pengajuan"];
        $deskripsi          = $data["perencanaan"];
        $anggaran           = $data["dana_anggaran"];
        $status_laporan     = $data["id"];
        $status_a           = $data["status"];
} else {
    if ($linkid_logistik == 'maintenance') {
            $q  = mysqli_query($conn, "SELECT * FROM maintenance WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");
        
        $s = $q->num_rows;
        
        
        $q2  = mysqli_query($conn, "SELECT * FROM maintenance WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status = 'OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan` DESC");
        
        $s2 = $q2->num_rows;
        // die(var_dump($s2));
        
        $id     = $_GET["id_unik"];
        $unik   = $_GET["id_p"];
        
        $query  = mysqli_query($conn, "SELECT * FROM maintenance WHERE id = '$id' AND MONTH(tgl_pengajuan) = '$unik' ");
        
        $data               = mysqli_fetch_assoc($query);
        $id_unik            = $data["id"];
        $nama               = $data["nama"];
        $laporan            = $data["laporan"];
        $program            = $data["kategori"];
        $maintenance        = $data["maintenance"];
        $jenis              = $data["jenis"];
        $qty                = $data["qty_anggaran"];
        $tanggal_1          = $data["tgl_pengajuan"];
        $deskripsi          = $data["perencanaan"];
        $anggaran           = $data["dana_anggaran"];
        $status_laporan     = $data["id"];
        $status_a           = $data["status"];
        } else {
        $q  = mysqli_query($conn, "SELECT * FROM baksos WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' AND laporan = 'Belum Laporan' ORDER BY `tgl_pengajuan` DESC");
        
        $s = $q->num_rows;
        
        
        $q2  = mysqli_query($conn, "SELECT * FROM baksos WHERE id_pengurus = '$_SESSION[id_pengurus]' AND status = 'OK' AND laporan = 'Menunggu Verifikasi' AND nama = '$nama_pengurus' ORDER BY `tgl_pengajuan` DESC");
        
        $s2 = $q2->num_rows;
        // die(var_dump($s2));
        
        $id     = $_GET["id_unik"];
        $unik   = $_GET["id_p"];
        
        $query  = mysqli_query($conn, "SELECT * FROM baksos WHERE id = '$id' AND MONTH(tgl_pengajuan) = '$unik' ");
        
        $data               = mysqli_fetch_assoc($query);
        $id_unik            = $data["id"];
        $nama               = $data["nama"];
        $laporan            = $data["laporan"];
        $program            = $data["program"];
        $tanggal_1          = $data["tgl_pengajuan"];
        $deskripsi          = $data["deskripsi"];
        $anggaran           = $data["dana_anggaran"];
        $status_laporan     = $data["id"];
        $status_a           = $data["status"];
        }
}

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-12 col-lg-12">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <?php if ($pengurus_id == 'kepala_produksi') { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=input_produksi">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=verifikasi_produksi"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>

                    <?php if(($id_unik == $id ) && $status_a == "OK" ){ ?>
                    <li class="page-item active"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_produksi&id_unik=<?= $id ?>&id_p=<?= $unik ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item active"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_input=laporan_produksi"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } ?>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=input_<?= $linkid_logistik ?>">
                            <small>Pengajuan</small>
                        </a></li>
                    <li class="page-item"><a class="page-link "
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=verifikasi_<?= $linkid_logistik ?>"></i><small>Verifikasi&nbsp;</small>
                            <?php if($s == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s ?></span>
                            <?php } ?>
                        </a></li>

                    <?php if(($id_unik == $id ) && $status_a == "OK" ){ ?>
                    <li class="page-item active"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=laporan_<?= $linkid_logistik ?>&id_unik=<?= $id ?>&id_p=<?= $unik ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } else { ?>
                    <li class="page-item active"><a class="page-link"
                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_input=laporan_<?= $linkid_logistik ?>"><small
                                class="text-white">Laporan&nbsp;</small>
                            <?php if($s2 == 0){ ?>
                            <?php }else { ?>
                            <span class="badge badge-danger badge-counter"><?= $s2 ?></span>
                            <?php } ?>
                        </a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <?php if ($pengurus_id == "kepala_produksi") { ?>
                <div class="card-body">
                    <label for=""><b>Laporan Produksi :</b>
                        <hr>
                    </label>
                    <!-- kondisi variabel -->
                    <?php if(($id_unik == $id ) && $status_a == "OK" ){ ?>
                    <div id="form">
                        <form action="" method="post" enctype="multipart/form-data"
                            onsubmit="return validasi_input2(this)">
                            <div class="mb-3">
                                <div class="form-text mb-2">
                                    Data Anggaran
                                </div>
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <input type="hidden" name="id_unik" value="<?= $id_unik ?>">
                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Produksi</b></span>
                                    <input type="text" class="form-control" name="program" value="<?= $program ?>"
                                        readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Jenis</b></span>
                                    <input type="text" class="form-control" name="jenis" value="<?= $jenis ?>" readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Cabang</b></span>
                                    <input type="text" class="form-control" name="cabang" value="<?= $cabang ?>"
                                        readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Tgl diajukan</b></span>
                                    <input type="text" class="form-control"
                                        value="<?= date('d-m-Y', strtotime($tanggal_1)); ?>" readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Rencana</b></span>
                                    <input type="text" class="form-control" name="deskripsi"
                                        value="<?= ucwords($deskripsi) ?>" readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Dana anggaran</b></span>
                                    <input type="text" class="form-control"
                                        value="Rp. <?= number_format($anggaran,0,"." , ".") ?>" readonly>
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
                                    placeholder="laporan Pembelian Bahan Produksi" id="alpabet"
                                    style="text-transform: capitalize;" autocomplete="off">
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

                            <div id="disabledSelect" class="form-text mb-2">
                                Lampirkan Bukti
                            </div>

                            <div class="file-drop-area">
                                <span class="choose-file-button">Pilih Gambar</span>
                                <span class="file-message">or drag and drop files here</span>
                                <input type="file" name="gambar[]" class="file-input" accept=".jpg,.jpeg,.png" multiple
                                    required>
                            </div>
                            <div id="divImageMediaPreview"> </div>

                            <div class="button">
                                <input type="submit" name="input" class="btn btn-primary w-100" value="Laporkan">
                            </div>
                        </form>
                        <!-- Display response messages -->
                        <?php if(!empty($response)) {?>
                        <div class="alert <?php echo $response["status"]; ?>">
                            <?php echo $response["message"]; ?>
                        </div>
                        <?php }?>
                    </div>
                    <?php }else { ?>
                    <div class="table-responsive">
                        <table id="tabel-data_product" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Produksi</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Terpakai</th>
                                    <th scope="col">Cashback</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['produksi']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>

                                    <?php if ($pengurus_id == "kepala_baksos") { ?>
                                    <td style="text-align: center;"><?= ucwords($r['laporan']) ?></td>
                                    <?php } else { ?>
                                    <td style="text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_edit=edit_laporan_produksi&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin Laporan ini mau diedit?!')">Edit</a>||
                                        <a class="btn btn-secondary"
                                            href="../content/hapus/hapus_laporan_produksi.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan <?= ucwords($r['program']) ?> Mau Dihapus?!')">Hapus</a>
                                    </td>
                                    <?php } ?>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>" class="btn btn-danger btn-xs view_data_produksi">
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th colspan="7">Total Seluruh</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_produksi" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_produksi">
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

                <?php } else { ?>
                <div class="card-body">
                    <label for=""><b>
                            <?php if ($linkid_logistik == 'maintenance') { ?>
                            Laporan Maintenance
                            <?php } else { ?>
                            Laporan Baksos
                            <?php } ?>:</b>
                        <hr>
                    </label>
                    <!-- kondisi variabel -->
                    <?php if(($id_unik == $id ) && $status_a == "OK" ){ ?>
                    <div id="form">
                        <form action="" method="post" enctype="multipart/form-data"
                            onsubmit="return validasi_input2(this)">
                            <div class="mb-3">
                                <div class="form-text mb-2">
                                    Data Anggaran
                                </div>
                                <input type="hidden" name="link" value="<?= $_SESSION["id_pengurus"] ?>">
                                <input type="hidden" name="id_unik" value="<?= $id_unik ?>">
                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Dari</b></span>
                                    <?php if ($linkid_logistik == 'maintenance') { ?>
                                    <input type="hidden" class="form-control" name="program" value="<?= $program ?>">
                                    <input type="text" class="form-control" value="<?= $program ?> <?= $maintenance ?>"
                                        readonly>
                                    <?php } else { ?>
                                    <input type="text" class="form-control" name="program" value="<?= $program ?>"
                                        readonly>
                                    <?php } ?>

                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Tgl diajukan</b></span>
                                    <input type="text" class="form-control"
                                        value="<?= date('d-m-Y', strtotime($tanggal_1)); ?>" readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Rencana</b></span>
                                    <input type="text" class="form-control" name="deskripsi"
                                        value="<?= ucwords($deskripsi) ?>" readonly>
                                </div>

                                <div class="input-group mb-1">
                                    <span class="input-group-text" id="basic-addon1"><b>Dana anggaran</b></span>
                                    <input type="text" class="form-control"
                                        value="Rp. <?= number_format($anggaran,0,"." , ".") ?>" readonly>
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
                                    placeholder="laporan pemakaian" id="alpabet" style="text-transform: capitalize;"
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

                            <div id="disabledSelect" class="form-text mb-2">
                                Lampirkan Bukti
                            </div>

                            <div class="file-drop-area">
                                <span class="choose-file-button">Pilih Gambar</span>
                                <span class="file-message">or drag and drop files here</span>
                                <input type="file" name="gambar[]" class="file-input" accept=".jpg,.jpeg,.png" multiple
                                    required>
                            </div>
                            <div id="divImageMediaPreview"> </div>

                            <div class="button">
                                <input type="submit" name="input" class="btn btn-primary w-100" value="Laporkan">
                            </div>
                        </form>
                        <!-- Display response messages -->
                        <?php if(!empty($response)) {?>
                        <div class="alert <?php echo $response["status"]; ?>">
                            <?php echo $response["message"]; ?>
                        </div>
                        <?php }?>
                    </div>
                    <?php }else { ?>
                    <div class="table-responsive">
                        <table id="tabel-data_laporan" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <?php if ($program == 'Bakti Sosial') { ?>
                                    <th scope="col">Baksos</th>
                                    <?php } else { ?>
                                    <th scope="col">Keterangan</th>
                                    <?php } ?>
                                    <th scope="col">Dilaporkan</th>
                                    <th scope="col">Tgl laporan</th>
                                    <th scope="col">Pemakaian</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Terpakai</th>
                                    <th scope="col">Cashback</th>
                                    <th scope="col">Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($r = $q2->fetch_assoc()) {
                                $bln       = substr($r['tgl_pengajuan'], 5,-3);
                                $anggaran = $r['dana_anggaran'];
                                $terpakai = $r['dana_terpakai'];
                                $sisa = $anggaran - $terpakai;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <?php if ($r["program"] == 'Bakti Sosial') { ?>
                                    <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                                    <?php } else { ?>
                                    <td style="text-align: center;"><?= ucwords($r['kategori']) ?>
                                        <?= $r['maintenance'] ?>
                                    </td>
                                    <?php } ?>
                                    <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                    <td style="text-align: center;">
                                        <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                                    <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                    <?php if ($pengurus_id == "kepala_baksos") { ?>
                                    <td style="text-align: center;"><?= ucwords($r['laporan']) ?></td>
                                    <?php } else { ?>
                                    <td style="text-align: center;"><a class="btn btn-primary"
                                            href="../user/<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_edit=edit_laporan_<?= $linkid_logistik ?>&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin Laporan ini mau diedit?!')">Edit</a>||
                                        <a class="btn btn-secondary"
                                            href="../content/hapus/hapus_laporan_<?= $linkid_logistik ?>.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                            onclick="return confirm('Yakin laporan <?= ucwords($r['program']) ?> Mau Dihapus?!')">Hapus</a>
                                    </td>
                                    <?php } ?>
                                    <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                                    <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
                                    <td style="text-align: center;"><input type="button" name="view" value="Lihat"
                                            data-id="<?= $r['id']  ?>"
                                            class="btn btn-danger btn-xs view_data_<?= $linkid_logistik ?>">
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
                                </tr>
                            </tfoot>
                        </table>
                        <!-- Modal -->
                        <div id="dataModal_<?= $linkid_logistik ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bukti Kwitansi</h4>
                                    </div>
                                    <div class="modal-body" id="detail_user_<?= $linkid_logistik ?>">
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
                <?php } ?>
            </div>
        </div>
    </div>
</div>