<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DataBase Laporan</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
                <ul class="pagination shadow-lg">
                    <li class="page-item active"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=database_baksos">
                            <small class="text-white">DataBase
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>

                    <li class="page-item"><a class="page-link"
                            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_grafik=baksos"><small>Grafik
                                Laporan&nbsp;
                            </small><span class="badge badge-danger badge-counter"></span>
                        </a></li>
                </ul>
            </div>
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">DataBase Laporan baksos</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    // global
                    $q  = mysqli_query($conn, "SELECT * FROM baksos WHERE laporan = 'Terverifikasi' AND status = 'OK' ORDER BY `tgl_pemakaian` DESC");
                    ?>
                    <div id="nav-program">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab"
                                    href="<?= $_SESSION["username"] ?>.php?id_database=database_baksos" role="tab"
                                    aria-controls="nav-home" aria-selected="true">Global</a>


                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-global" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <br>
                                <div class="table-responsive">
                                    <table id="tabel-data_laporan_verif"
                                        class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th scope="col">No</th>
                                                <th scope="col">Program</th>
                                                <th scope="col">Tanggung Jawab</th>
                                                <th scope="col">Periode</th>
                                                <th scope="col">Deskripsi Pemakaian</th>
                                                <th scope="col">Dana Anggaran</th>
                                                <th scope="col">Dana Terpakai</th>
                                                <th scope="col">Dana Cashback</th>
                                                <th scope="col">Bukti Pemakaian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($r = $q->fetch_assoc()) {
                                                $convert   = convertDateDBtoIndo($r['tgl_pemakaian']);
                                                $bulan     = substr($convert, 2);

                                                $anggaran = $r['dana_anggaran'];
                                                $terpakai = $r['dana_terpakai'];

                                                $sisa = $anggaran - $terpakai;

                                                ?>

                                            <tr>
                                                <td style="text-align: center;"><?= $no++ ?></td>
                                                <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                                                <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                                <td style="text-align: center;"><?= $bulan ?></td>
                                                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                                                <td>Rp. <?= number_format($anggaran, 0, ".", ".") ?></td>
                                                <td>Rp. <?= number_format($terpakai, 0, ".", ".") ?></td>
                                                <td>Rp. <?= number_format($sisa, 0, ".", ".") ?></td>
                                                <td style="text-align: center;"><input type="button" name="view"
                                                        value="Lihat" data-id="<?= $r['id']  ?>"
                                                        class="btn btn-danger btn-xs view_data_baksos">
                                                </td>
                                            </tr>

                                            <?php
                        }
                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <th colspan="5">Total Cashback</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>

                                        </tfoot>
                                    </table>
                                    <!-- Modal -->
                                    <div id="dataModal_baksos" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bukti Kwitansi</h4>
                                                </div>
                                                <div class="modal-body" id="detail_user_baksos">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>