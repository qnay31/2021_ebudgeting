<?php

error_reporting(0);
session_start();

if (!isset($_SESSION["halaman_utama"])) {
    header("Location: ../index.php?pesan=gagal");
    exit;
}

require "../function.php";
$linkid_logistik = $_GET["id_link_logistik"];
$linkid_cashback = $_GET["id_link_cashback"];
$id_admin = $_GET["id_link_admin"];
$linkid_taman = $_GET["id_taman"];

$kueri = mysqli_query($conn, "SELECT * FROM akun_pengurus WHERE username = '$_SESSION[username]'");

$has_kueri = mysqli_fetch_array($kueri);
$pengurus_id = $has_kueri["id_pengurus"];
$nama_pengurus = $has_kueri["nama"];
$posisi = $has_kueri["posisi"];

// die(var_dump($id_admin));

$query_p  = mysqli_query($conn, "SELECT * FROM akun_pengurus WHERE id_pengurus = '$pengurus_id' AND `nama` = '$nama_pengurus' ");

$data_p  = mysqli_fetch_assoc($query_p);
$profil     = $data_p["profil"];
$nama_user  = $data_p["nama"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php if ($_GET["id_topbar"] == "log") { ?>
    <meta http-equiv="refresh" content="60" />
    <?php } ?>

    <title>e-Daily Alkirom Amanah</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- owl corousel -->
    <link rel="stylesheet" href="../owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../owlcarousel/assets/owl.theme.default.min.css">

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.2/datatables.min.css" />

    <!-- icon -->
    <link rel="icon" href="../img/logo/logo_favicon.png" type="image/gif" sizes="16x16">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css?version=<?= filemtime('../css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="../css/breadcumb.css?version=<?= filemtime('../css/breadcumb.css'); ?>">
    <link rel="stylesheet" href="../css/custom.css?version=<?= filemtime('../css/custom.css'); ?>">

    <!-- chat live -->

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        include 'sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php
                include 'topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- input pengajuan program-->
                <?php if ($_GET["id_input"] == "input_program") { ?>
                <?php include '../content/input/input_program.php'; ?>

                <!-- input pengajuan logistik -->
                <?php } elseif ($_GET["id_input"] == "input_logistik") { ?>
                <?php include '../content/input/input_logistik.php'; ?>

                <!-- input pengajuan operasional -->
                <?php } elseif ($_GET["id_input"] == "input_operasional") { ?>
                <?php include '../content/input/input_logistik.php'; ?>

                <!-- input pengajuan kepala logistik -->
                <?php } elseif ($_GET["id_input"] == "input_$linkid_logistik") { ?>
                <?php include '../content/input/input_kepala_logistik.php'; ?>

                <!-- input pengajuan produksi -->
                <?php } elseif ($_GET["id_input"] == "input_produksi") { ?>
                <?php include '../content/input/input_kepala_logistik.php'; ?>

                <!-- input pengajuan humas -->
                <?php } elseif ($_GET["id_input"] == "input_humas") { ?>
                <?php include '../content/input/input_humas.php'; ?>

                <!-- input pengajuan income -->
                <?php } elseif ($_GET["id_input"] == "input_income") { ?>
                <?php include '../content/input/input_income.php'; ?>

                <!-- input pengajuan cashback -->
                <?php } elseif ($_GET["id_input"] == "input_cashback") { ?>
                <?php include '../content/input/input_cashback.php'; ?>

                <!-- verifikasi program -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_program") { ?>
                <?php include '../content/verifikasi/verifikasi_program.php'; ?>

                <!-- verifikasi logistik -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_logistik") { ?>
                <?php include '../content/verifikasi/verifikasi_logistik.php'; ?>

                <!-- verifikasi kepala Logistik -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_$linkid_logistik") { ?>
                <?php include '../content/verifikasi/verifikasi_kepala_logistik.php'; ?>

                <!-- verifikasi produksi -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_produksi") { ?>
                <?php include '../content/verifikasi/verifikasi_kepala_logistik.php'; ?>

                <!-- verifikasi humas -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_humas") { ?>
                <?php include '../content/verifikasi/verifikasi_humas.php'; ?>

                <!-- verifikasi income -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_income") { ?>
                <?php include '../content/verifikasi/verifikasi_income.php'; ?>

                <!-- verifikasi cashback -->
                <?php } elseif ($_GET["id_input"] == "verifikasi_cashback") { ?>
                <?php include '../content/verifikasi/verifikasi_cashback.php'; ?>

                <!-- laporan program -->
                <?php } elseif ($_GET["id_input"] == "laporan_program") { ?>
                <?php include '../content/laporan/laporan_program.php'; ?>

                <!-- laporan logistik -->
                <?php } elseif ($_GET["id_input"] == "laporan_logistik") { ?>
                <?php include '../content/laporan/laporan_logistik.php'; ?>

                <!-- laporan kepala logistik -->
                <?php } elseif ($_GET["id_input"] == "laporan_$linkid_logistik") { ?>
                <?php include '../content/laporan/laporan_kepala_logistik.php'; ?>

                <!-- laporan produksi -->
                <?php } elseif ($_GET["id_input"] == "laporan_produksi") { ?>
                <?php include '../content/laporan/laporan_kepala_logistik.php'; ?>

                <!-- laporan humas -->
                <?php } elseif ($_GET["id_input"] == "laporan_humas") { ?>
                <?php include '../content/laporan/laporan_humas.php'; ?>

                <!-- check rab program -->
                <?php } elseif ($_GET["id_check"] == "check_program") { ?>
                <?php include '../content/checklist/program/check_pengajuan.php'; ?>

                <!-- check rab logistik -->
                <?php } elseif ($_GET["id_check"] == "check_logistik") { ?>
                <?php include '../content/checklist/logistik/check_pengajuan.php'; ?>

                <!-- edit rab program -->
                <?php } elseif ($_GET["id_edit"] == "edit_program") { ?>
                <?php include '../content/edit/edit_program.php'; ?>

                <!-- edit rab logistik -->
                <?php } elseif ($_GET["id_edit"] == "edit_logistik") { ?>
                <?php include '../content/edit/edit_logistik.php'; ?>

                <!-- edit rab kepala logistik -->
                <?php } elseif ($_GET["id_edit"] == "edit_$linkid_logistik") { ?>
                <?php include '../content/edit/edit_kepala_logistik.php'; ?>

                <!-- edit rab produksi -->
                <?php } elseif ($_GET["id_edit"] == "edit_produksi") { ?>
                <?php include '../content/edit/edit_kepala_logistik.php'; ?>

                <!-- edit rab humas -->
                <?php } elseif ($_GET["id_edit"] == "edit_humas") { ?>
                <?php include '../content/edit/edit_humas.php'; ?>

                <!-- edit pemasukan humas -->
                <?php } elseif ($_GET["id_edit"] == "edit_pemasukan") { ?>
                <?php include '../content/edit/edit_pemasukan.php'; ?>

                <!-- edit income harian-->
                <?php } elseif ($_GET["id_edit"] == "edit_income") { ?>
                <?php include '../content/edit/edit_income.php'; ?>

                <!-- edit cashback-->
                <?php } elseif ($_GET["id_edit"] == "edit_cashback") { ?>
                <?php include '../content/edit/edit_cashback.php'; ?>

                <!-- edit gaji -->
                <?php } elseif ($_GET["id_edit"] == "edit_gaji") { ?>
                <?php include '../content/edit/edit_gaji.php'; ?>

                <!-- edit aset -->
                <?php } elseif ($_GET["id_edit"] == "edit_aset") { ?>
                <?php include '../content/edit/edit_aset.php'; ?>

                <!-- edit operasional -->
                <?php } elseif ($_GET["id_edit"] == "edit_operasional") { ?>
                <?php include '../content/edit/edit_operasional.php'; ?>

                <!-- edit lainnya -->
                <?php } elseif ($_GET["id_edit"] == "edit_lainnya") { ?>
                <?php include '../content/edit/edit_lainnya.php'; ?>

                <!-- belum laporan -->
                <?php } elseif ($_GET["id_check"] == "lap_pending") { ?>
                <?php include '../content/checklist/program/check_verifikasi.php'; ?>

                <!-- belum laporan logistik -->
                <?php } elseif ($_GET["id_check"] == "logistik_pending") { ?>
                <?php include '../content/checklist/logistik/check_verifikasi.php'; ?>

                <!-- verif laporan -->
                <?php } elseif ($_GET["id_check"] == "verif_laporan") { ?>
                <?php include '../content/checklist/program/check_laporan.php'; ?>

                <!-- edit laporan program -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_program") { ?>
                <?php include '../content/edit/edit_laporan_program.php'; ?>

                <!-- edit laporan logistik -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_logistik") { ?>
                <?php include '../content/edit/edit_laporan_logistik.php'; ?>

                <!-- edit laporan kepala logistik -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_$linkid_logistik") { ?>
                <?php include '../content/edit/edit_laporan_kepala_logistik.php'; ?>

                <!-- edit laporan produksi -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_produksi") { ?>
                <?php include '../content/edit/edit_laporan_kepala_logistik.php'; ?>

                <!-- edit laporan humas -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_humas") { ?>
                <?php include '../content/edit/edit_laporan_humas.php'; ?>

                <!-- edit laporan gaji -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_gaji") { ?>
                <?php include '../content/edit/edit_laporan_gaji.php'; ?>

                <!-- edit laporan aset -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_aset") { ?>
                <?php include '../content/edit/edit_laporan_aset.php'; ?>

                <!-- edit laporan operasional -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_operasional") { ?>
                <?php include '../content/edit/edit_laporan_operasional.php'; ?>

                <!-- edit laporan lainnya -->
                <?php } elseif ($_GET["id_edit"] == "edit_laporan_lainnya") { ?>
                <?php include '../content/edit/edit_laporan_lainnya.php'; ?>

                <!-- daily program -->
                <?php } elseif ($_GET["id_input"] == "daily_program") { ?>
                <?php include '../content/daily/report_program.php'; ?>

                <!-- humas daily -->
                <?php } elseif ($_GET["id_input"] == "daily_humas") { ?>
                <?php include '../content/daily/report_humas.php'; ?>

                <!-- edit laporan program -->
                <?php } elseif ($_GET["id_edit"] == "edit_daily") { ?>
                <?php include '../content/edit/edit_daily.php'; ?>

                <!-- database program -->
                <?php } elseif ($_GET["id_database"] == "database_program") { ?>
                <?php include '../database/database_program.php'; ?>

                <!-- database global program -->
                <?php } elseif ($_GET["id_database"] == "global_program") { ?>
                <?php include '../database/database_global_program.php'; ?>

                <!-- database global baksos -->
                <?php } elseif ($_GET["id_database"] == "database_baksos") { ?>
                <?php include '../database/database_baksos.php'; ?>

                <!-- database global logistik -->
                <?php } elseif ($_GET["id_database"] == "global_logistik") { ?>
                <?php include '../database/database_global_logistik.php'; ?>

                <!-- database global logistik -->
                <?php } elseif ($_GET["id_database"] == "kacab_logistik") { ?>
                <?php include '../database/database_global_logistik.php'; ?>

                <!-- database global humas -->
                <?php } elseif ($_GET["id_database"] == "global_humas") { ?>
                <?php include '../database/database_global_humas.php'; ?>

                <!-- database income -->
                <?php } elseif ($_GET["id_database"] == "database_income") { ?>
                <?php include '../database/database_income.php'; ?>

                <!-- database media -->
                <?php } elseif ($_GET["id_database"] == "database_media") { ?>
                <?php include '../database/database_media.php'; ?>

                <!-- database harian income -->
                <?php } elseif ($_GET["id_database"] == "harian_media") { ?>
                <?php include '../laporan/media_sosial/income.php'; ?>

                <!-- grafik kepala program -->
                <?php } elseif ($_GET["id_grafik"] == "program") { ?>
                <?php include '../grafik/chart_global_program.php'; ?>

                <!-- grafik baksos -->
                <?php } elseif ($_GET["id_grafik"] == "baksos") { ?>
                <?php include '../grafik/chart_global_baksos.php'; ?>

                <!-- grafik global program -->
                <?php } elseif ($_GET["id_grafik"] == "global_program") { ?>
                <?php include '../grafik/chart_global_program.php'; ?>

                <!-- grafik global logistik -->
                <?php } elseif ($_GET["id_grafik"] == "global_logistik") { ?>
                <?php include '../grafik/chart_global_logistik.php'; ?>

                <!-- grafik kacab logistik -->
                <?php } elseif ($_GET["id_grafik"] == "kacab_logistik") { ?>
                <?php include '../grafik/chart_global_logistik.php'; ?>

                <!-- grafik global humas -->
                <?php } elseif ($_GET["id_grafik"] == "global_humas") { ?>
                <?php include '../grafik/chart_global_humas.php'; ?>

                <!-- grafik global pemasukan -->
                <?php } elseif ($_GET["id_grafik"] == "database_income") { ?>
                <?php include '../grafik/chart_global_pemasukan.php'; ?>

                <!-- grafik global media sosial -->
                <?php } elseif ($_GET["id_grafik"] == "media") { ?>
                <?php include '../grafik/chart_global_income.php'; ?>

                <!-- check global rab -->
                <?php } elseif ($_GET["id_check"] == "check_global") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengajuan.php'; ?>

                <!-- pending global -->
                <?php } elseif ($_GET["id_check"] == "global_pending") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_verifikasi.php'; ?>

                <!-- global laporan -->
                <?php } elseif ($_GET["id_check"] == "global_laporan") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_laporan.php'; ?>

                <!-- check kepala cabang rab -->
                <?php } elseif ($_GET["id_check"] == "check_cabang") { ?>
                <?php include '../content/checklist/kepala_cabang/check_pengajuan.php'; ?>

                <!-- pending Kepala cabang -->
                <?php } elseif ($_GET["id_check"] == "cabang_pending") { ?>
                <?php include '../content/checklist/kepala_cabang/check_verifikasi.php'; ?>

                <!-- Kepala cabang laporan -->
                <?php } elseif ($_GET["id_check"] == "cabang_laporan") { ?>
                <?php include '../content/checklist/kepala_cabang/check_laporan.php'; ?>

                <!-- check laporan logistik -->
                <?php } elseif ($_GET["id_check"] == "logistik_laporan") { ?>
                <?php include '../content/checklist/logistik/check_laporan.php'; ?>

                <!-- database logistik -->
                <?php } elseif ($_GET["id_database"] == "database_logistik") { ?>
                <?php include '../database/database_logistik.php'; ?>

                <!-- pemasukan celengan -->
                <?php } elseif ($_GET["id_pemasukan"] == "pemasukan_celengan") { ?>
                <?php include '../content/pemasukan/humas.php'; ?>

                <!-- check celengan -->
                <?php } elseif ($_GET["id_pemasukan"] == "check_celengan") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_celengan.php'; ?>

                <!-- check kotak amal -->
                <?php } elseif ($_GET["id_pemasukan"] == "check_kotak") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_kotak.php'; ?>

                <!-- pemasukan kotak amal -->
                <?php } elseif ($_GET["id_pemasukan"] == "pemasukan_kotak amal") { ?>
                <?php include '../content/pemasukan/humas.php'; ?>

                <!-- check income -->
                <?php } elseif ($_GET["id_pemasukan"] == "check_income") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_income.php'; ?>

                <!-- check pengeluaran -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_gaji") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_gaji") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran -->
                <?php } elseif ($_GET["id_laporan"] == "check_gaji") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- check pengeluaran aset -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_aset") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran aset -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_aset") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran aset -->
                <?php } elseif ($_GET["id_laporan"] == "check_aset") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- database global gaji -->
                <?php } elseif ($_GET["id_database"] == "global_gaji") { ?>
                <?php include '../database/database_global_gaji.php'; ?>

                <!-- grafik global gaji -->
                <?php } elseif ($_GET["id_grafik"] == "global_gaji") { ?>
                <?php include '../grafik/chart_global_gaji.php'; ?>

                <!-- database global aset -->
                <?php } elseif ($_GET["id_database"] == "global_aset") { ?>
                <?php include '../database/database_global_aset.php'; ?>

                <!-- grafik global aset -->
                <?php } elseif ($_GET["id_grafik"] == "global_aset") { ?>
                <?php include '../grafik/chart_global_aset.php'; ?>

                <!-- check pengeluaran operasional -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_operasional") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran operasional -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_operasional") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran operasional -->
                <?php } elseif ($_GET["id_laporan"] == "check_operasional") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- database global operasional -->
                <?php } elseif ($_GET["id_database"] == "global_operasional") { ?>
                <?php include '../database/database_global_operasional.php'; ?>

                <!-- grafik global operasional -->
                <?php } elseif ($_GET["id_grafik"] == "global_operasional") { ?>
                <?php include '../grafik/chart_global_operasional.php'; ?>

                <!-- check pengeluaran lainnya -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_lainnya") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran lainnya -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_lainnya") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran lainnya -->
                <?php } elseif ($_GET["id_laporan"] == "check_lainnya") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- database global lainnya -->
                <?php } elseif ($_GET["id_database"] == "global_lainnya") { ?>
                <?php include '../database/database_global_lainnya.php'; ?>

                <!-- grafik global lainnya -->
                <?php } elseif ($_GET["id_grafik"] == "global_lainnya") { ?>
                <?php include '../grafik/chart_global_lainnya.php'; ?>

                <!-- check pengeluaran produksi -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_produksi") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran produksi -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_produksi") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran produksi -->
                <?php } elseif ($_GET["id_laporan"] == "check_produksi") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- database global produksi -->
                <?php } elseif ($_GET["id_database"] == "global_produksi") { ?>
                <?php include '../database/database_global_produksi.php'; ?>

                <!-- grafik global produksi -->
                <?php } elseif ($_GET["id_grafik"] == "global_produksi") { ?>
                <?php include '../grafik/chart_global_produksi.php'; ?>

                <!-- check pengeluaran maintenance -->
                <?php } elseif ($_GET["id_pengeluaran"] == "check_maintenance") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_pengeluaran.php'; ?>

                <!-- verifikasi pengeluaran maintenance -->
                <?php } elseif ($_GET["id_verifikasi"] == "check_maintenance") { ?>
                <?php include '../content/checklist/ketua_yayasan/verifikasi_pengeluaran.php'; ?>

                <!-- laporan pengeluaran maintenance -->
                <?php } elseif ($_GET["id_laporan"] == "check_maintenance") { ?>
                <?php include '../content/checklist/ketua_yayasan/laporan_pengeluaran.php'; ?>

                <!-- database global maintenance -->
                <?php } elseif ($_GET["id_database"] == "global_maintenance") { ?>
                <?php include '../database/database_global_maintenance.php'; ?>

                <!-- grafik global maintenance -->
                <?php } elseif ($_GET["id_grafik"] == "global_maintenance") { ?>
                <?php include '../grafik/chart_global_maintenance.php'; ?>

                <!-- check cashback -->
                <?php } elseif ($_GET["id_pemasukan"] == "check_cashback") { ?>
                <?php include '../content/checklist/ketua_yayasan/check_cashback.php'; ?>

                <!-- database global cashback -->
                <?php } elseif ($_GET["id_database"] == "global_cashback") { ?>
                <?php include '../database/database_global_cashback.php'; ?>

                <!-- grafik global cashback -->
                <?php } elseif ($_GET["id_grafik"] == "global_cashback") { ?>
                <?php include '../grafik/chart_global_cashback.php'; ?>

                <!-- gabung income -->
                <?php } elseif ($_GET["id_edit"] == "gabung_income") { ?>
                <?php include '../content/edit/gabung_income.php'; ?>

                <!-- setting user -->
                <?php } elseif ($_GET["id_topbar"] == "setting") { ?>
                <?php include '../content/topbar/setting.php'; ?>

                <!-- setting password -->
                <?php } elseif ($_GET["id_topbar"] == "set_pw") { ?>
                <?php include '../content/topbar/set_password.php'; ?>

                <!-- log activity -->
                <?php } elseif ($_GET["id_topbar"] == "log") { ?>
                <?php include '../content/topbar/log_activity.php'; ?>

                <!-- profil -->
                <?php } elseif ($_GET["id_topbar"] == "profil") { ?>
                <?php include '../content/topbar/profil.php'; ?>

                <!-- data pengurus -->
                <?php } elseif ($_GET["id_data"] == "pengurus") { ?>
                <?php include '../content/data/pengurus.php'; ?>

                <!-- laporan global -->
                <?php } elseif ($_GET["id_laporan"] == "laporan_global") { ?>
                <?php include '../content/data/laporan_global.php'; ?>

                <!-- ubah data_admin -->
                <?php } elseif ($_GET["id_admin_ubah"] == "ubah_$id_admin") { ?>
                <?php include '../content/admin/ubah_admin.php'; ?>

                <!-- ubah -->
                <?php } elseif ($_GET["id_admin_edit"] == "edit_$id_admin") { ?>
                <?php include '../content/edit/edit_admin.php'; ?>

                <!-- data 2021 -->
                <?php } elseif ($_GET["id_laporan"] == "laporan_2021") { ?>
                <?php include '../content/global/data_2021.php'; ?>

                <!-- bulanan 2021 -->
                <?php } elseif ($_GET["id_laporan"] == "bulanan_2021") { ?>
                <?php include '../content/global/bulanan_2021.php'; ?>

                <?php } else { ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php if ($linkid_logistik == 'produksi') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Produksi</h1>
                        <?php } elseif ($linkid_logistik == 'baksos') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Bakti Sosial</h1>
                        <?php } elseif ($linkid_logistik == 'maintenance') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Maintenance Global</h1>
                        <?php } elseif ($pengurus_id == 'kepala_logistik') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Logistik Global</h1>
                        <?php } elseif ($linkid_cashback == 'cashback') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Cashback Yayasan</h1>

                        <?php } elseif ($linkid_taman == 'operasional_yayasan') { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Operasional Yayasan</h1>
                        <?php } else { ?>
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <?php } ?>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <?php if ($pengurus_id == "ketua_yayasan") { ?>
                    <div class="row" id="laporan_tahunan">
                        <div class="col-lg-6 mb-4 card-bot">
                            <a href="#" id="tombol">
                                <div class="card bg-light text-black shadow">
                                    <div class="card-body">Data Laporan 2021
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 mb-4 card-bot">
                            <a href="#" id="tombol2">
                                <div class="card bg-light text-black shadow">
                                    <div class="card-body">Data Laporan 2022
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12 mb-4 card-bot" id="box">
                            <a href="<?= $_SESSION["username"] ?>.php?id_laporan=laporan_2021">
                                <div class="card bg-danger text-white shadow">
                                    <div class="card-body text-center">
                                        <b>Laporan Tahun 2021</b>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12 mb-4 card-bot" id="box2">
                            <a href="#" data-toggle="modal" data-target="#maintenance">
                                <div class="card bg-danger text-white shadow">
                                    <div class="card-body text-center">
                                        <b>Laporan Tahun 2022</b>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Content Row -->
                    <?php
                        include 'card_top.php';
                        ?>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <?php
                            include 'chart.php';
                            ?>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Color System -->
                            <?php
                                include 'color_bot.php';
                                ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include 'footer.php';
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include 'modal_logout.php';
    ?>

    <?php include '../modal/maintenance.php' ?>


    <!-- Bootstrap core JavaScript-->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.2/datatables.min.js"></script>
    <!-- plugin datatables -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <!-- owl corosel -->
    <script src="../owlcarousel/owl.carousel.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/validasi.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).on('change', '.file-input', function() {

        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }



        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function() {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $("<img />");
                    img.attr("style", "width: 100%; padding: 10px");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });

    $(document).ready(function() {

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function() {
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
    </script>

    <script>
    // grafik program global
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_ketua_yayasan_total");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 500000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik program kepala cabang
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_program_bogor);
            isi_data2.push(data[i].terpakai_program_bogor);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_kepala_cabang_program");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik baksos global
    $.getJSON("https://edaily.alkiromamanah.com/data/data_baksos_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chart_content_ketua_yayasan_baksos");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#DDA0DD",
                        hoverBackgroundColor: "#EE82EE",
                        borderColor: "#DDA0DD",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#1cc88a",
                        hoverBackgroundColor: "#17a673",
                        borderColor: "#1cc88a",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 400000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik logisitk global
    $.getJSON("https://edaily.alkiromamanah.com/data/data_logistik_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_ketua_yayasan_logistik");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#CD853F",
                        hoverBackgroundColor: "#F4A460",
                        borderColor: "#CD853F",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#36b9cc",
                        hoverBackgroundColor: "#2c9faf",
                        borderColor: "#36b9cc",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik logistik kepala cabang
    $.getJSON("https://edaily.alkiromamanah.com/data/data_logistik_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_logistik_bogor);
            isi_data2.push(data[i].terpakai_logistik_bogor);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_kepala_cabang_logistik");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#CD853F",
                        hoverBackgroundColor: "#F4A460",
                        borderColor: "#CD853F",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#36b9cc",
                        hoverBackgroundColor: "#2c9faf",
                        borderColor: "#36b9cc",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik humas global
    $.getJSON("https://edaily.alkiromamanah.com/data/data_humas_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_ketua_yayasan_humas");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#6A5ACD",
                        hoverBackgroundColor: "#7B68EE",
                        borderColor: "#6A5ACD",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#f6c23e",
                        hoverBackgroundColor: "#dda20a",
                        borderColor: "#f6c23e",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 1000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik humas depok
    $.getJSON("https://edaily.alkiromamanah.com/data/data_humas_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_humas_depok);
            isi_data2.push(data[i].terpakai_humas_depok);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_humas_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#6A5ACD",
                        hoverBackgroundColor: "#7B68EE",
                        borderColor: "#6A5ACD",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#f6c23e",
                        hoverBackgroundColor: "#dda20a",
                        borderColor: "#f6c23e",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik humas bogor
    $.getJSON("https://edaily.alkiromamanah.com/data/data_humas_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_humas_bogor);
            isi_data2.push(data[i].terpakai_humas_bogor);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_humas_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#6A5ACD",
                        hoverBackgroundColor: "#7B68EE",
                        borderColor: "#6A5ACD",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#f6c23e",
                        hoverBackgroundColor: "#dda20a",
                        borderColor: "#f6c23e",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik program depok
    $.getJSON("https://localhost/edaily/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_program_depok);
            isi_data2.push(data[i].terpakai_program_depok);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_kepala_program_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik kesehatan depok
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_kesehatan);
            isi_data2.push(data[i].terpakai_kesehatan);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartbar_content_kesehatan_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 20000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik pendidikan depok
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_pendidikan);
            isi_data2.push(data[i].terpakai_pendidikan);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartbar_content_pendidikan_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 20000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik program bogor
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_program_bogor);
            isi_data2.push(data[i].terpakai_program_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_content_kepala_program_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 200000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik kesehatan bogor
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_kesehatan_bogor);
            isi_data2.push(data[i].terpakai_kesehatan_bogor);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartbar_content_kesehatan_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 20000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik pendidikan bogor
    $.getJSON("https://edaily.alkiromamanah.com/data/data_program_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];
        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_pendidikan_bogor);
            isi_data2.push(data[i].terpakai_pendidikan_bogor);
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartbar_content_pendidikan_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 20000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik logistik depok
    $.getJSON("https://edaily.alkiromamanah.com/data/data_logistik_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_logistik_depok);
            isi_data2.push(data[i].terpakai_logistik_depok);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_logistik_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#CD853F",
                        hoverBackgroundColor: "#F4A460",
                        borderColor: "#CD853F",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#36b9cc",
                        hoverBackgroundColor: "#2c9faf",
                        borderColor: "#36b9cc",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik logistik bogor
    $.getJSON("https://edaily.alkiromamanah.com/data/data_logistik_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_logistik_bogor);
            isi_data2.push(data[i].terpakai_logistik_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_logistik_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#CD853F",
                        hoverBackgroundColor: "#F4A460",
                        borderColor: "#CD853F",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#36b9cc",
                        hoverBackgroundColor: "#2c9faf",
                        borderColor: "#36b9cc",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik income humas
    $.getJSON("https://localhost/edaily/data/data_pemasukan_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].pemasukan_kotak_amal);
            isi_data2.push(data[i].pemasukan_celengan);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_pemasukan");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Kotak Amal",
                        backgroundColor: " 	#1E90FF",
                        hoverBackgroundColor: "#00BFFF",
                        borderColor: " 	#1E90FF",
                        data: isi_data,
                    },

                    {
                        label: "Celengan",
                        backgroundColor: "#FFDAB9",
                        hoverBackgroundColor: "#FFDEAD",
                        borderColor: "#FFDAB9",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik celengan
    $.getJSON("https://localhost/edaily/data/data_pemasukan_2021.php", function(data) {

        var isi_labels = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data2.push(data[i].pemasukan_celengan);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_celengan");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Celengan",
                    backgroundColor: "#FFDAB9",
                    hoverBackgroundColor: "#FFDEAD",
                    borderColor: "#FFDAB9",
                    data: isi_data2,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik kotak amal
    $.getJSON("https://localhost/edaily/data/data_pemasukan_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].pemasukan_kotak_amal);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_kotakamal");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Kotak Amal",
                    backgroundColor: " 	#1E90FF",
                    hoverBackgroundColor: "#00BFFF",
                    borderColor: " 	#1E90FF",
                    data: isi_data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 8
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik global income
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].income_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Income Global",
                    backgroundColor: "#FF0000",
                    hoverBackgroundColor: "#DC143C",
                    borderColor: "#FF0000",
                    data: isi_data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 1500000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik_global/gedung
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data_a = [];
        var isi_data_b = [];
        var isi_data_ig = [];
        var isi_data_bog = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data_a.push(data[i].income_a);
            isi_data_b.push(data[i].income_b);
            isi_data_ig.push(data[i].income_instagram);
            isi_data_bog.push(data[i].income_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Gedung A",
                        backgroundColor: "#1E90FF",
                        hoverBackgroundColor: "#00BFFF",
                        borderColor: " 	#1E90FF",
                        data: isi_data_a,
                    },
                    {
                        label: "Gedung B",
                        backgroundColor: "#8B0000",
                        hoverBackgroundColor: "#A52A2A",
                        borderColor: "#8B0000",
                        data: isi_data_b,
                    },
                    {
                        label: "Gedung Instagram",
                        backgroundColor: "#4B0082",
                        hoverBackgroundColor: "#8A2BE2",
                        borderColor: "#4B0082",
                        data: isi_data_ig,
                    },
                    {
                        label: "Gedung Bogor",
                        backgroundColor: "#DA70D6",
                        hoverBackgroundColor: "#FF00FF",
                        borderColor: "#DA70D6",
                        data: isi_data_bog,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 600000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik income a
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data_a = [];
        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data_a.push(data[i].income_a);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income_a");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Gedung A",
                    backgroundColor: "#1E90FF",
                    hoverBackgroundColor: "#00BFFF",
                    borderColor: " 	#1E90FF",
                    data: isi_data_a,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 500000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik income b
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data_b = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data_b.push(data[i].income_b);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income_b");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Gedung B",
                    backgroundColor: "#8B0000",
                    hoverBackgroundColor: "#A52A2A",
                    borderColor: "#8B0000",
                    data: isi_data_b,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 500000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik income instagram
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data_ig = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data_ig.push(data[i].income_instagram);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income_ig");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Gedung Instagram",
                    backgroundColor: "#4B0082",
                    hoverBackgroundColor: "#8A2BE2",
                    borderColor: "#4B0082",
                    data: isi_data_ig,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik income bogor
    $.getJSON("https://localhost/edaily/data/data_income_2021.php", function(data) {

        var isi_labels = [];
        var isi_data_bog = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data_bog.push(data[i].income_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_income_bog");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Gedung Bogor",
                    backgroundColor: "#DA70D6",
                    hoverBackgroundColor: "#FF00FF",
                    borderColor: "#DA70D6",
                    data: isi_data_bog,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik gaji karyawan global
    $.getJSON("https://localhost/edaily/data/data_gaji_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_gaji_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Dana Anggaran",
                        backgroundColor: "#e74a3b",
                        hoverBackgroundColor: "rgb(216, 2, 2)",
                        borderColor: "#e74a3b",
                        data: isi_data,
                    },
                    {
                        label: "Dana Terpakai",
                        backgroundColor: "#DA70D6",
                        hoverBackgroundColor: "#FF00FF",
                        borderColor: "#DA70D6",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik gaji depok
    $.getJSON("https://localhost/edaily/data/data_gaji_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_gaji_depok);
            isi_data2.push(data[i].terpakai_gaji_depok);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_gaji_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Dana Anggaran",
                        backgroundColor: "#808000",
                        hoverBackgroundColor: "#F0E68C",
                        borderColor: "#808000",
                        data: isi_data,
                    },
                    {
                        label: "Dana Terpakai",
                        backgroundColor: "#006400",
                        borderColor: "#006400",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik gaji bogor
    $.getJSON("https://localhost/edaily/data/data_gaji_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_gaji_bogor);
            isi_data2.push(data[i].terpakai_gaji_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_gaji_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#CD853F",
                        hoverBackgroundColor: "#F4A460",
                        borderColor: "#CD853F",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#36b9cc",
                        hoverBackgroundColor: "#2c9faf",
                        borderColor: "#36b9cc",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik aset global
    $.getJSON("https://localhost/edaily/data/data_aset_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_aset_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#32CD32",
                        hoverBackgroundColor: "#00FF00",
                        borderColor: "#32CD32",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 300000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik operasional yayasan
    $.getJSON("https://localhost/edaily/data/data_operasional_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_operasional_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#32CD32",
                        hoverBackgroundColor: "#00FF00",
                        borderColor: "#32CD32",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik lainnya global
    $.getJSON("https://localhost/edaily/data/data_lainnya_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_lainnya_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran",
                        backgroundColor: "#4B0082",
                        hoverBackgroundColor: "#8A2BE2",
                        borderColor: "#4B0082",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian",
                        backgroundColor: "#FFDAB9",
                        hoverBackgroundColor: "#FFDEAD",
                        borderColor: "#FFDAB9",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik produksi global
    $.getJSON("https://localhost/edaily/data/data_produksi_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_produksi_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Global",
                        backgroundColor: "#6495ED",
                        hoverBackgroundColor: "#4682B4",
                        borderColor: "#6495ED",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Global",
                        backgroundColor: "#7B68EE",
                        hoverBackgroundColor: "#9370DB",
                        borderColor: "#7B68EE",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik produksi depok
    $.getJSON("https://localhost/edaily/data/data_produksi_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_produksi_depok);
            isi_data2.push(data[i].terpakai_produksi_depok);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_produksi_depok");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Global",
                        backgroundColor: "#6495ED",
                        hoverBackgroundColor: "#4682B4",
                        borderColor: "#6495ED",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Global",
                        backgroundColor: "#7B68EE",
                        hoverBackgroundColor: "#9370DB",
                        borderColor: "#7B68EE",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik produksi bogor
    $.getJSON("https://localhost/edaily/data/data_produksi_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_produksi_bogor);
            isi_data2.push(data[i].terpakai_produksi_bogor);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_produksi_bogor");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Bogor",
                        backgroundColor: "#228B22",
                        hoverBackgroundColor: "#008000",
                        borderColor: "#228B22",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Bogor",
                        backgroundColor: "#000080",
                        hoverBackgroundColor: "#00008B",
                        borderColor: "#000080",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik maintenance global
    $.getJSON("https://localhost/edaily/data/data_maintenance_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_global);
            isi_data2.push(data[i].terpakai_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_maintenance_global");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Global",
                        backgroundColor: "#0000CD",
                        hoverBackgroundColor: "#00008B",
                        borderColor: "#0000CD",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Global",
                        backgroundColor: "#8B4513",
                        hoverBackgroundColor: "#A0522D",
                        borderColor: "#8B4513",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik maintenance aset
    $.getJSON("https://localhost/edaily/data/data_maintenance_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_maintenance_aset);
            isi_data2.push(data[i].terpakai_maintenance_aset);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_maintenance_aset");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Aset",
                        backgroundColor: "#C71585",
                        hoverBackgroundColor: "#DA70D6",
                        borderColor: "#C71585",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Aset",
                        backgroundColor: "#0000CD",
                        hoverBackgroundColor: "#00008B",
                        borderColor: "#0000CD",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik maintenance gedung
    $.getJSON("https://localhost/edaily/data/data_maintenance_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];
        var isi_data2 = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].anggaran_maintenance_gedung);
            isi_data2.push(data[i].terpakai_maintenance_gedung);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_maintenance_gedung");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                        label: "Anggaran Aset",
                        backgroundColor: "#66CDAA",
                        hoverBackgroundColor: "#3CB371",
                        borderColor: "#66CDAA",
                        data: isi_data,
                    },

                    {
                        label: "Pemakaian Aset",
                        backgroundColor: "#8B4513",
                        hoverBackgroundColor: "#A0522D",
                        borderColor: "#8B4513",
                        data: isi_data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });

    // grafik cashback
    $.getJSON("https://localhost/edaily/data/data_cashback_2021.php", function(data) {

        var isi_labels = [];
        var isi_data = [];

        // console.log(isi_data2);

        $(data).each(function(i) {
            isi_labels.push(data[i].bulan);
            isi_data.push(data[i].cashback_global);
        });
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart Example
        var ctx = document.getElementById("chartarea_cashback");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: isi_labels,
                datasets: [{
                    label: "Cashback Global",
                    backgroundColor: "#FF0000",
                    hoverBackgroundColor: "#DC143C",
                    borderColor: "#FF0000",
                    data: isi_data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100000000,
                            maxTicksLimit: 10,
                            callback: function(value, index, values) {
                                if (parseInt(value) > 999) {
                                    return 'Rp. ' + value.toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else if (parseInt(value) < -999) {
                                    return '-Rp. ' + Math.abs(value).toString().replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return 'Rp. ' + value;
                                }
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#e0e0e0',
                    titleFontSize: 14,
                    backgroundColor: "rgb(32,32,32)",
                    bodyFontColor: "#e0e0e0",
                    borderColor: '#202020',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ||
                                '';
                            return datasetLabel + ': Rp. ' + Number(tooltipItem.yLabel)
                                .toFixed(0)
                                .replace(/./g,
                                    function(c,
                                        i, a) {
                                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ?
                                            "." +
                                            c : c;
                                    });
                        }
                    }
                },
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {

        $("#tombol").click(function() {
            $("#box").toggle("slow");
            $("#box2").hide("slow");
        })

        $("#tombol2").click(function() {
            $("#box2").toggle("slow");
            $("#box").hide("slow");
        })

        $("#exampleModal").on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#exampleModal #divImageMediaPreview').empty();
        });

        $("#pemasukan").on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#pemasukan #divImageMediaPreview').empty();
        });

        // modal laporan program
        $('.view_data_program').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_lap_program.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_program").html(data)
                    $("#dataModal_program").modal('show')
                }
            })
        })

        // modal daily report
        $('.view_data_daily').click(function() {
            var data_id = $(this).data("id")
            var data_name = $(this).data("name")
            $.ajax({
                url: "../resi/isi_lap_daily.php",
                method: "POST",
                data: {
                    data_id: data_id,
                    data_name
                },
                success: function(data) {
                    $("#detail_user_daily").html(data)
                    $("#dataModal_daily").modal('show')
                }
            })
        })

        // modal laporan logistik
        $('.view_data_logistik').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_lap_logistik.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_logistik").html(data)
                    $("#dataModal_logistik").modal('show')
                }
            })
        })

        // modal laporan baksos
        $('.view_data_baksos').click(function() {
            var data_id = $(this).data("id")
            var data_name = $(this).data("name")
            $.ajax({
                url: "../resi/isi_resi_lap_baksos.php",
                method: "POST",
                data: {
                    data_id: data_id,
                    data_name
                },
                success: function(data) {
                    $("#detail_user_baksos").html(data)
                    $("#dataModal_baksos").modal('show')
                }
            })
        })

        // modal laporan humas 
        $('.view_data_humas').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_lap_humas.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_humas").html(data)
                    $("#dataModal_humas").modal('show')
                }
            })
        })

        // modal pemasukan
        $('.view_data_pemasukan').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_lap_pemasukan.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_pemasukan").html(data)
                    $("#dataModal_pemasukan").modal('show')
                }
            })
        })

        // modal produksi
        $('.view_data_produksi').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_produksi.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_produksi").html(data)
                    $("#dataModal_produksi").modal('show')
                }
            })
        })

        // modal aset
        $('.view_data_aset').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_aset.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_aset").html(data)
                    $("#dataModal_aset").modal('show')
                }
            })
        })

        // modal lainnya
        $('.view_data_lain').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_lainnya.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_lain").html(data)
                    $("#dataModal_lain").modal('show')
                }
            })
        })

        // modal operasional
        $('.view_data_operasional').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_operasional.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_operasional").html(data)
                    $("#dataModal_operasional").modal('show')
                }
            })
        })

        // modal operasional
        $('.view_data_maintenance').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "../resi/isi_resi_maintenance.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user_maintenance").html(data)
                    $("#dataModal_maintenance").modal('show')
                }
            })
        })

        // tabel media sosial
        $('#tabel-data_media').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '10%',
                targets: 2
            }, {
                width: '15%',
                targets: 3
            }, {
                width: '15%',
                targets: 4
            }, {
                width: '15%',
                targets: 6
            }, {
                width: '20%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data income global
        $('#tabel-data_laporan_income').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '20%',
                targets: 2
            }, {
                width: '20%',
                targets: 3
            }, {
                width: '20%',
                targets: 4
            }, {
                width: '20%',
                targets: 5
            }, {
                width: '20%',
                targets: 6
            }],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(4).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data harian income 
        $('#tabel-data_harian_income').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            columnDefs: [{
                width: '20%',
                targets: 1
            }, {
                width: '20%',
                targets: 2
            }, {
                width: '30%',
                targets: 3
            }, {
                width: '30%',
                targets: 4
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(4).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data pemasukan
        $('#tabel-data_income').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '10%',
                targets: 2
            }, {
                width: '20%',
                targets: 5
            }, {
                width: '15%',
                targets: 7
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    '' + rupiah + ' Pcs'
                );

                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data verifikasi
        $('#tabel-data_verifikasi').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 5
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_verifikasi2').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 5
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_verifikasi3').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 5
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_verifikasi4').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 5
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data laporan
        $('#tabel-data_laporan').DataTable({
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 4
            }, {
                width: '15%',
                targets: 6
            }, {
                width: '15%',
                targets: 7
            }, {
                width: '15%',
                targets: 8
            }],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_laporan2').DataTable({
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 4
            }, {
                width: '15%',
                targets: 6
            }, {
                width: '15%',
                targets: 7
            }, {
                width: '15%',
                targets: 8
            }],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel check laporan 
        $('#tabel-data_cek_lap').DataTable({
            "scrollX": true,
            "autoWidth": true,

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this terpakai
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this cashback
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(11).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_cek_lap2').DataTable({
            "scrollX": true,
            "autoWidth": true,

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this terpakai
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this cashback
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(11).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_cek_lap3').DataTable({
            "scrollX": true,
            "autoWidth": true,

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this terpakai
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this cashback
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(11).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        $('#tabel-data_cek_lap4').DataTable({
            "scrollX": true,
            "autoWidth": true,

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this terpakai
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this cashback
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(11).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data daily report
        $('#tabel-data_daily').DataTable({
            "scrollX": true,
            "autoWidth": true,
        });

        $('#tabel-data_pengurus').DataTable({});

        // tabel data laporan program
        $('#tabel-data_laporan_verif').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            "autoWidth": true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total terpakai
                pageTotal2 = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string2 = pageTotal2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah2 + ''
                );

                // Total cashbak
                pageTotal3 = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string3 = pageTotal3.toString(),
                    sisa3 = number_string3.length % 3,
                    rupiah3 = number_string3.substr(0, sisa3),
                    ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

                if (ribuan3) {
                    separator3 = sisa3 ? '.' : '';
                    rupiah3 += separator3 + ribuan3.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah3 + ''
                );
            }
        });

        // tabel data global gaji karyawan
        $('#tabel-data_gaji_global').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '18%',
                targets: 1
            }, {
                width: '18%',
                targets: 2
            }, {
                width: '18%',
                targets: 4
            }, {
                width: '18%',
                targets: 3
            }, {
                width: '18%',
                targets: 4
            }, {
                width: '18%',
                targets: 5
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total terpakai
                pageTotal2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string2 = pageTotal2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + rupiah2 + ''
                );

                // Total cashbak
                pageTotal3 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string3 = pageTotal3.toString(),
                    sisa3 = number_string3.length % 3,
                    rupiah3 = number_string3.substr(0, sisa3),
                    ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

                if (ribuan3) {
                    separator3 = sisa3 ? '.' : '';
                    rupiah3 += separator3 + ribuan3.join('.');
                }
                // Update footer
                $(api.column(4).footer()).html(
                    'Rp. ' + rupiah3 + ''
                );

                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data cabang gaji karyawan
        $('#tabel-data_gaji_cabang').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '25%',
                targets: 1
            }, {
                width: '50%',
                targets: 2
            }, {
                width: '50%',
                targets: 3
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total terpakai
                pageTotal2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string2 = pageTotal2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + rupiah2 + ''
                );
            }
        });

        // tabel data verifikasi aset
        $('#tabel-data_aset').DataTable({
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '10%',
                targets: 2
            }, {
                width: '15%',
                targets: 3
            }, {
                width: '10%',
                targets: 4
            }, {
                width: '18%',
                targets: 5
            }, {
                width: '8%',
                targets: 6
            }, {
                width: '8%',
                targets: 7
            }, {
                width: '12%',
                targets: 8
            }, {
                width: '15%',
                targets: 9
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );

            }
        });

        // tabel data laporan aset
        $('#tabel-data_lap_aset').DataTable({
            "scrollX": true,
            "autoWidth": true,

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this terpakai
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this cashback
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(11).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this anggaran
                pageTotal = api
                    .column(12, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(12).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data global aset
        $('#tabel-data_aset_global').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '45%',
                targets: 2
            }, {
                width: '45%',
                targets: 3
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total anggaran
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + rupiah + ''
                );

            }
        });

        // tabel laporan verifikasi aset
        $('#tabel-data_aset_verif').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '10%',
                targets: 2
            }, {
                width: '15%',
                targets: 3
            }, {
                width: '10%',
                targets: 4
            }, {
                width: '20%',
                targets: 5
            }, {
                width: '12%',
                targets: 7
            }, {
                width: '12%',
                targets: 8
            }, {
                width: '12%',
                targets: 9
            }],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    rupiah + ' Pcs'
                );

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel laporan verifikasi opaerasional
        $('#tabel-data_operasional_verif').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '10%',
                targets: 2
            }],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data verifikasi produksi
        $('#tabel-data_produksi').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '8%',
                targets: 2
            }, {
                width: '10%',
                targets: 3
            }, {
                width: '25%',
                targets: 6
            }, {
                width: '8%',
                targets: 7
            }, {
                width: '15%',
                targets: 8
            }, {
                width: '12%',
                targets: 9
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel laporan produksi / pending
        $('#tabel-data_product').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '8%',
                targets: 2
            }, {
                width: '10%',
                targets: 3
            }, {
                width: '20%',
                targets: 5
            }, {
                width: '10%',
                targets: 6
            }, {
                width: '10%',
                targets: 7
            }, {
                width: '10%',
                targets: 8
            }, {
                width: '10%',
                targets: 9
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this page
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel laporan verif prodoksi
        $('#tabel-data_lap_produksi').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '20%',
                targets: 4
            }, {
                width: '10%',
                targets: 5
            }, {
                width: '20%',
                targets: 7
            }, {
                width: '10%',
                targets: 8
            }, {
                width: '10%',
                targets: 9
            }, {
                width: '10%',
                targets: 10
            }],
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this cashback
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this anggaran
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this anggaran
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(10).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel cashback chek
        $('#tabel-data_cashback').DataTable({
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '25%',
                targets: 5
            }, {
                width: '10%',
                targets: 8
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabal global cashback
        $('#tabel-data_cashback_global').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            columnDefs: [{
                width: '15%',
                targets: 1
            }, {
                width: '85%',
                targets: 2
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel global cashback verif
        $('#tabel-data_cashback_verif').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '20%',
                targets: 2
            }, {
                width: '20%',
                targets: 3
            }, {
                width: '30%',
                targets: 4
            }, {
                width: '30%',
                targets: 5
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // Total over this page
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel data laporan program
        $('#tabel-data_ubah_laporan').DataTable({
            "scrollX": true,
            "autoWidth": true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total terpakai
                pageTotal2 = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string2 = pageTotal2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah2 + ''
                );

                // Total cashbak
                pageTotal3 = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string3 = pageTotal3.toString(),
                    sisa3 = number_string3.length % 3,
                    rupiah3 = number_string3.substr(0, sisa3),
                    ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

                if (ribuan3) {
                    separator3 = sisa3 ? '.' : '';
                    rupiah3 += separator3 + ribuan3.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah3 + ''
                );
            }
        });

        // data global tahunan
        $('#tabel-data_global_tahunan').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            // "autoWidth": true,
            columnDefs: [{
                width: '10%',
                targets: 1
            }, {
                width: '15%',
                targets: 2
            }, {
                width: '15%',
                targets: 4
            }, {
                width: '15%',
                targets: 3
            }, {
                width: '15%',
                targets: 4
            }, {
                width: '15%',
                targets: 5
            }, {
                width: '15%',
                targets: 6
            }, {
                width: '15%',
                targets: 7
            }],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total anggaran
                pageTotal = api
                    .column(2, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(2).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total terpakai
                pageTotal2 = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string2 = pageTotal2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                // Update footer
                $(api.column(3).footer()).html(
                    'Rp. ' + rupiah2 + ''
                );

                // Total cashbak
                pageTotal3 = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string3 = pageTotal3.toString(),
                    sisa3 = number_string3.length % 3,
                    rupiah3 = number_string3.substr(0, sisa3),
                    ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

                if (ribuan3) {
                    separator3 = sisa3 ? '.' : '';
                    rupiah3 += separator3 + ribuan3.join('.');
                }
                // Update footer
                $(api.column(4).footer()).html(
                    'Rp. ' + rupiah3 + ''
                );

                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(6).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(7).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });

        // tabel global bulanan
        $('#tabel-data_bulanan').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            "autoWidth": true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\Rp,.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over this cashback
                pageTotal = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(5).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this anggaran
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(8).footer()).html(
                    'Rp. ' + rupiah + ''
                );

                // Total over this anggaran
                pageTotal = api
                    .column(9, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var number_string = pageTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                // Update footer
                $(api.column(9).footer()).html(
                    'Rp. ' + rupiah + ''
                );
            }
        });
    });

    $("#produksi").change(function() {
        // variabel dari nilai combo box 
        var produksi = $("#produksi").val();
        // console.log(id_kendaraan);
        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "list_pembelian.php",
            data: "produksi=" + produksi,
            success: function(data) {
                $("#bagian").html(data);
                // $("#tanggal").html(data);
            }
        });
    });

    $("#management").change(function() {
        // variabel dari nilai combo box 
        var management = $("#management").val();
        // console.log(id_kendaraan);
        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "list_management.php",
            data: "management=" + management,
            success: function(data) {
                $("#bagian").html(data);
                // $("#tanggal").html(data);
            }
        });
    });

    $("#gedung").change(function() {
        // variabel dari nilai combo box 
        var gedung = $("#gedung").val();
        // console.log(id_kendaraan);
        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "list_gabung_income.php",
            data: "gedung=" + gedung,
            success: function(data) {
                $("#income_gabung").html(data);
                // $("#tanggal").html(data);
            }
        });
    });
    </script>
</body>

</html>