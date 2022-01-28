<div class="row card-bot">
    <?php if ($pengurus_id == "ketua_yayasan") { ?>
    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Program
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_baksos">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Bakti Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_logistik">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Logistik
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_humas">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    DataBase Laporan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_gaji">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Gaji Karyawan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_aset">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Aset Yayasan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_operasional">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Operasional Yayasan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_lainnya">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    DataBase Laporan Biaya Lainnya
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Produksi
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_maintenance">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Maintenance
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    DataBase Pemasukan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_media">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    DataBase Pemasukan Media Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_cashback">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    DataBase Cashback
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } elseif ($pengurus_id == "kepala_cabang") { ?>
    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Program
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_baksos">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Bakti Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=kacab_logistik">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Logistik
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_humas">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    DataBase Laporan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income" data-toggle="modal"
            data-target="#maintenance">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    DataBase Laporan Pemasukan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($pengurus_id == "kepala_program") { ?>
    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Program
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_baksos">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan bakti Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($pengurus_id == "program_kesehatan") { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Program
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($pengurus_id == "program_pendidikan") { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Program
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($pengurus_id == "kepala_logistik") { ?>
    <?php if ($linkid_logistik == "baksos") { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=database_baksos">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Bakti Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($linkid_logistik == 'maintenance') { ?>
    <div class="col-lg-12 mb-4">
        <a
            href="<?= $_SESSION["username"] ?>.php?id_link_logistik=<?= $linkid_logistik ?>&id_database=global_maintenance">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Maintenance
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } else { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_logistik">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Logistik
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } elseif ($posisi == 'Logistik Gedung Management') { ?>
    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_logistik">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Logistik
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_gaji">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Gaji Karyawan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_aset">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Laporan Aset Yayasan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_lainnya">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    DataBase Laporan Biaya Lainnya
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } elseif ($pengurus_id == "logistik") { ?>

    <?php if ($linkid_taman == "operasional_yayasan") { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_taman=<?= $linkid_taman ?>&id_database=global_operasional">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    DataBase Laporan Operasional Yayasan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_logistik">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Logistik
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>


    <?php } elseif ($pengurus_id == "kepala_humas") { ?>
    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_humas">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Laporan Pemasukan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } elseif ($pengurus_id == "humas") { ?>
    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_humas">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    DataBase Laporan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Laporan Pemasukan Humas
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } elseif ($pengurus_id == "kepala_income") { ?>
    <?php if ($linkid_cashback == 'cashback') { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_link_cashback=cashback&id_database=global_cashback">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Cashback Yayasan
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_media">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    DataBase Pemasukan Media Sosial
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
    <?php } elseif ($pengurus_id == "kepala_produksi") { ?>
    <div class="col-lg-12 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=global_produksi">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    DataBase Laporan Produksi
                    <div class="text-white-50 small">Lihat Laporan</div>
                </div>
            </div>
        </a>
    </div>

    <?php } elseif ($pengurus_id == "kepala_admin") { ?>
    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_link_admin=program&id_admin_ubah=ubah_program">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Ubah Data Program
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Ubah Data Bakti Sosial
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Ubah Data Logistik
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Ubah Data Humas
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Ubah Data Gaji Karyawan
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    Ubah Data Aset Yayasan
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-light text-black shadow">
                <div class="card-body">
                    Ubah Data Operasional Yayasan
                    <div class="text-black-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Ubah Data Biaya Lainnya
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Ubah Data Produksi
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Ubah Data Maintenance
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Ubah Data Income Humas
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Ubah Data Income Media Sosial
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_database=database_income">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    Ubah Data Dana Cashback
                    <div class="text-white-50 small">Ubah</div>
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>

    <?php } ?>
</div>