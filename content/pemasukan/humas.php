<?php

$id = $_GET["id_pemasukan"];

$id_income = substr($id,10);

if (isset($_POST["input_celengan"]) ) {
    $link = $_SESSION["username"];
    $id = $_GET["id_pemasukan"];
    $id_income = substr($id,10);
    if(income_celengan($_POST) > 0 ) {
        echo "<script>
                alert('Income celengan berhasil diinput');
                document.location.href = '$link.php?id_pemasukan=pemasukan_$id_income';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    $id = $_GET["id_pemasukan"];
    $id_income = substr($id,10);
    if(income_celengan($_POST) > 0 ) {
        echo "<script>
                alert('Income kotak amal berhasil diinput');
                document.location.href = '$link.php?id_pemasukan=pemasukan_$id_income';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

// celengan


if ($id_income == "celengan") {
    $q = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = '$id_income' AND id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' AND status = 'Pending' ORDER BY `tgl_ambil` DESC ");

    $s = $q->num_rows;
} else {
   $q = mysqli_query($conn, "SELECT * FROM pemasukan WHERE kategori = '$id_income' AND id_pengurus = '$_SESSION[id_pengurus]' AND nama = '$nama_pengurus' AND status = 'Pending' ORDER BY `tgl_ambil` DESC ");

    $s = $q->num_rows;
}

    
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
        <?php if ($pengurus_id == "ketua_yayasan") { ?>
        <?php } else { ?>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
            <ul class="pagination shadow-lg">
                <li class="page-item active"><a class="page-link" href="#" data-toggle="modal" data-target="#pemasukan">
                        <small class="text-white"><b><span style="font-size:15px;">&#43;</span>&nbsp;Input Pemasukan
                                <span style="text-transform: capitalize;"><?= $id_income ?></span>
                                &#128522;</b>
                        </small>
                    </a></li>
            </ul>
        </div>
        <?php } ?>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <label for=""><b>Pemasukan <span style="text-transform: capitalize;"><?= $id_income ?></span></b>
                    <hr>
                </label>
                <div class="table-responsive">
                    <table id="tabel-data_income" class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Cabang</th>
                                <th scope="col">Tanggal Pengambilan</th>
                                <th scope="col">Lokasi Distribusi</th>
                                <th scope="col">Jml <span style="text-transform: capitalize;"><?= $id_income ?></span>
                                </th>
                                <th scope="col">Income</th>
                                <th scope="col">Pengaturan</th>
                                <th scope="col">Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($r = $q->fetch_assoc()) {
                                $bln       = substr($r['tgl_ambil'], 5,-3);
                                $convert   = convertDateDBtoIndo($r['tgl_ambil']);
                                ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++ ?></td>
                                <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                                <td style="text-align: center;"><?= ucwords($r['posisi']) ?></td>
                                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                                <td style="text-align: center;">
                                    <?= $convert ?></td>
                                <td><?= ucwords($r['lokasi']) ?></td>
                                <td style="text-align: center;"><?= ucwords($r['jumlah']) ?></td>
                                <td style="text-align: center;">Rp. <?= number_format($r['income'],0,"." , ".") ?></td>
                                <?php if($r['nama'] == $_SESSION['nama']){ ?>
                                <td style=" text-align: center;"><a class="btn btn-primary"
                                        href="../user/<?= $_SESSION["username"] ?>.php?id_pemasukan=pemasukan_<?= $id_income ?>&id_edit=edit_pemasukan&id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Yakin Pemasukan ini mau diedit?!')">Edit</a> || <a
                                        class="btn btn-danger"
                                        href="../content/hapus/hapus_pemasukan.php?id_unik=<?= $r['id'] ?>&id_p=<?= $bln ?>"
                                        onclick="return confirm('Anda Yakin Mau Menghapus Daily ini ?')">Hapus</a>
                                </td>
                                <?php } else { ?>
                                <td style=" text-align: center;" class="disabled"><a class="btn btn-primary disable"
                                        href="#">Edit</a> || <a class="btn btn-danger disable" href="#">Hapus</a>
                                </td>
                                <?php } ?>
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
</div>

<!-- Modal daily report-->
<?php
include 'modal_pemasukan.php';
?>