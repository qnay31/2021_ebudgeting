<?php 
$key_bulanan = $_GET["id_bulanan"];
$id_bulan  = $_GET["id_bulan"];
if ($key_bulanan == "income") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM income WHERE status = 'Terverifikasi' ORDER BY `tgl_pemasukan` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_income_new");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $income_a = $data['income_a'];
            $total_income_a[$i] = $income_a;
            $hasil_income_a = array_sum($total_income_a);

            $income_b = $data['income_b'];
            $total_income_b[$i] = $income_b;
            $hasil_income_b = array_sum($total_income_b);

            $income_bogor = $data['income_bogor'];
            $total_income_bogor[$i] = $income_bogor;
            $hasil_income_bogor = array_sum($total_income_bogor);

            $income_instagram = $data['income_instagram'];
            $total_income_instagram[$i] = $income_instagram;
            $hasil_income_instagram = array_sum($total_income_instagram);

            $income_global = $data['income_global'];
            $total_income_global[$i] = $income_global;
            $hasil_income_global = array_sum($total_income_global);
        }

        $label = "Income Global 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM income WHERE status = 'Terverifikasi' AND MONTH(tgl_pemasukan) = '$id_bulan' ORDER BY `tgl_pemasukan` ASC");
        
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM income WHERE status = 'Terverifikasi' AND MONTH(tgl_pemasukan) = '$id_bulan' ORDER BY `tgl_pemasukan` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemasukan']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_income_new WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $income_a = $data['income_a'];
            $total_income_a[$i] = $income_a;
            $hasil_income_a = array_sum($total_income_a);

            $income_b = $data['income_b'];
            $total_income_b[$i] = $income_b;
            $hasil_income_b = array_sum($total_income_b);

            $income_bogor = $data['income_bogor'];
            $total_income_bogor[$i] = $income_bogor;
            $hasil_income_bogor = array_sum($total_income_bogor);

            $income_instagram = $data['income_instagram'];
            $total_income_instagram[$i] = $income_instagram;
            $hasil_income_instagram = array_sum($total_income_instagram);

            $income_global = $data['income_global'];
            $total_income_global[$i] = $income_global;
            $hasil_income_global = array_sum($total_income_global);
        }

        $label = "Income $bulan 2021";
    }
} elseif ($key_bulanan == "pemasukan") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE status = 'Terverifikasi' ORDER BY `tgl_ambil` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_pemasukan");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $income_celengan = $data['pemasukan_celengan'];
            $total_income_celengan[$i] = $income_celengan;
            $hasil_income_celengan = array_sum($total_income_celengan);

            $income_kotak = $data['pemasukan_kotak_amal'];
            $total_income_kotak[$i] = $income_kotak;
            $hasil_income_kotak = array_sum($total_income_kotak);

            $hasil_income_global = $hasil_income_kotak+$hasil_income_celengan;
        }

        $label = "Income Humas 2021";

    } else {
        $q  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE status = 'Terverifikasi' AND MONTH(tgl_ambil) = '$id_bulan' ORDER BY `tgl_ambil` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM pemasukan WHERE status = 'Terverifikasi' AND MONTH(tgl_ambil) = '$id_bulan' ORDER BY `tgl_ambil` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_ambil']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_pemasukan WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $income_celengan = $data['pemasukan_celengan'];
            $total_income_celengan[$i] = $income_celengan;
            $hasil_income_celengan = array_sum($total_income_celengan);

            $income_kotak = $data['pemasukan_kotak_amal'];
            $total_income_kotak[$i] = $income_kotak;
            $hasil_income_kotak = array_sum($total_income_kotak);

            $hasil_income_global = $hasil_income_kotak+$hasil_income_celengan;
        }

        $label = "Income $bulan 2021";
    }
    

} elseif ($key_bulanan == "program") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_pemakaian` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_program");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_program_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_program_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_program_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_program_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Program Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemakaian']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_program WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_program_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_program_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_program_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_program_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Program Yayasan $bulan 2021";
    }
    

} elseif ($key_bulanan == "baksos") {

    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_pemakaian` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_baksos");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $cashback_global = $hasil_anggaran - $hasil_terpakai;
    
        }
    
        $label = "Bakti Sosial Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemakaian']);
            $bulan     = substr($convert, 3, -5);
        }
        $query = mysqli_query($conn, "SELECT * FROM data_baksos WHERE bulan = '$bulan'");

        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $cashback_global = $hasil_anggaran - $hasil_terpakai;

        }

        $label = "Bakti Sosial Yayasan $bulan 2021";
    }
    

} elseif ($key_bulanan == "logistik") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_pemakaian` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_logistik");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_logistik_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_logistik_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_logistik_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_logistik_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Logistik Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemakaian']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_logistik WHERE bulan = '$bulan' ");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_logistik_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_logistik_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_logistik_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_logistik_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Logistik Yayasan $bulan 2021";
        }
    

} elseif ($key_bulanan == "gaji_karyawan") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_laporan` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_gaji");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_gaji_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_gaji_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_gaji_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_gaji_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Gaji Karyawan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_laporan']);
            $bulan     = substr($convert, 3, -5);
        }
        
        $query = mysqli_query($conn, "SELECT * FROM data_gaji WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_gaji_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_gaji_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_gaji_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_gaji_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Gaji Karyawan $bulan 2021";
    }
    

} elseif ($key_bulanan == "aset_yayasan") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_laporan` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_aset_yayasan");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $cashback_global = $hasil_anggaran - $hasil_terpakai;

        }

        $label = "Aset Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_laporan']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_aset_yayasan WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $cashback_global = $hasil_anggaran - $hasil_terpakai;

        }

        $label = "Aset Yayasan $bulan 2021";
    }
    

} elseif ($key_bulanan == "operasional_yayasan") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_laporan` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $cashback_global = $hasil_anggaran - $hasil_terpakai;
    
        }
    
        $label = "Operasional Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_laporan']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_operasional_yayasan WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $cashback_global = $hasil_anggaran - $hasil_terpakai;
    
        }
    
        $label = "Operasional Yayasan $bulan 2021";
    }
    

} elseif ($key_bulanan == "anggaran_lain") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_laporan` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_lainnya");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $cashback_global = $hasil_anggaran - $hasil_terpakai;
    
        }
    
        $label = "Anggaran Lainnya Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_laporan) = '$id_bulan' ORDER BY `tgl_laporan` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_laporan']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_lainnya WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_global'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_global'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $cashback_global = $hasil_anggaran - $hasil_terpakai;
    
        }
    
        $label = "Anggaran Lainnya Yayasan $bulan 2021";
    }
    

} elseif ($key_bulanan == "produksi") {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_pemakaian` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_produksi");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_produksi_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_produksi_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $d_anggaran_b = $data['anggaran_produksi_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);
    
            $d_terpakai_b = $data['terpakai_produksi_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);
    
            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;
    
            $cashback_global = $anggaran_global - $terpakai_global;
    
        }
    
        $label = "Produksi Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemakaian']);
            $bulan     = substr($convert, 3, -5);
        }

        $query = mysqli_query($conn, "SELECT * FROM data_produksi WHERE bulan = '$bulan'");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_produksi_depok'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);
    
            $d_terpakai = $data['terpakai_produksi_depok'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);
    
            $d_anggaran_b = $data['anggaran_produksi_bogor'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);
    
            $d_terpakai_b = $data['terpakai_produksi_bogor'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);
    
            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;
    
            $cashback_global = $anggaran_global - $terpakai_global;
    
        }
    
        $label = "Produksi Yayasan $bulan 2021";
    }
    

} else {
    if ($id_bulan == "") {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' ORDER BY `tgl_pemakaian` ASC");

        $query = mysqli_query($conn, "SELECT * FROM data_maintenance");
        $i = 1;
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_maintenance_aset'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_maintenance_aset'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_maintenance_gedung'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_maintenance_gedung'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Maintenance Yayasan 2021";
    } else {
        $q  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        $i = 1;
        $q2  = mysqli_query($conn, "SELECT * FROM $key_bulanan WHERE laporan = 'Terverifikasi' AND MONTH(tgl_pemakaian) = '$id_bulan' ORDER BY `tgl_pemakaian` ASC");
        while ($data2 = mysqli_fetch_array($q2)) {
            $i++;
            $convert   = convertDateDBtoIndo($data2['tgl_pemakaian']);
            $bulan     = substr($convert, 3, -5);
        }
        $query = mysqli_query($conn, "SELECT * FROM data_maintenance WHERE bulan = '$bulan' ");
        while($data = mysqli_fetch_array($query))
        {   
            $i++;
            $d_anggaran = $data['anggaran_maintenance_aset'];
            $total_anggaran[$i] = $d_anggaran;
            $hasil_anggaran = array_sum($total_anggaran);

            $d_terpakai = $data['terpakai_maintenance_aset'];
            $total_terpakai[$i] = $d_terpakai;
            $hasil_terpakai = array_sum($total_terpakai);

            $d_anggaran_b = $data['anggaran_maintenance_gedung'];
            $total_anggaran_b[$i] = $d_anggaran_b;
            $hasil_anggaran_b = array_sum($total_anggaran_b);

            $d_terpakai_b = $data['terpakai_maintenance_gedung'];
            $total_terpakai_b[$i] = $d_terpakai_b;
            $hasil_terpakai_b = array_sum($total_terpakai_b);

            $anggaran_global = $hasil_anggaran + $hasil_anggaran_b;
            $terpakai_global = $hasil_terpakai + $hasil_terpakai_b;

            $cashback_global = $anggaran_global - $terpakai_global;

        }

        $label = "Maintenance Yayasan $bulan 2021";
    }
    
}


?>
<?php if ($key_bulanan == "income") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Gedung A</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_a,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Gedung B</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Gedung Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_bogor,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Gedung Instagram</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_instagram,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Income</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_harian_income" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Gedung</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Income</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                while ($r = $q->fetch_assoc()) {
                $convert   = convertDateDBtoIndo($r['tgl_pemasukan']);
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td>Income Media Sosial</td>
                <td>Gedung <?= ucwords($r['gedung']) ?></td>
                <td><?= $convert ?></td>
                <td>Rp. <?= number_format($r['income'], 0, ".", ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="4">Total Income</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>


<?php } elseif ($key_bulanan == "pemasukan") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Celengan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_celengan,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income Kotak Amal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_kotak,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Income</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_income_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_harian_income" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Pengambilan</th>
                <th scope="col">Income</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                while ($r = $q->fetch_assoc()) {
                $convert   = convertDateDBtoIndo($r['tgl_ambil']);
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td>Income Humas</td>
                <td><?= ucwords($r['kategori']) ?></td>
                <td><?= $convert ?></td>
                <td>Rp. <?= number_format($r['income'], 0, ".", ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="4">Total Income</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "program") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($anggaran_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Terpakai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($terpakai_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Program</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Program</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "baksos") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Anggaran Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Terpakai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Cashback</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Program</th>
                <th scope="col">Tanggung Jawab</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td style="text-align: center;"><?= ucwords($r['program']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['nama']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "logistik") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($anggaran_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Terpakai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($terpakai_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Logistik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Logistik</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['program']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "gaji_karyawan") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Gaji Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Gaji Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Gaji Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Gaji Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Gaji Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($anggaran_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Gaji Terpakai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($terpakai_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Gaji Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['gaji_karyawan'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['kategori']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                <td><?= ucwords($r['pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "aset_yayasan") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Aset Yayasan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['kategori']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                <td><?= ucwords($r['pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "operasional_yayasan") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Operasional Yayasan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['kategori']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                <td><?= ucwords($r['pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "anggaran_lain") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Global</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Biaya Lainnya</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['kategori']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_dibuat'])); ?></td>
                <td><?= ucwords($r['deskripsi']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_laporan'])); ?></td>
                <td><?= ucwords($r['pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } elseif ($key_bulanan == "produksi") { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Depok</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Bogor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($anggaran_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Terpakai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($terpakai_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Produksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Produksi</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['produksi']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                <td><?= ucwords($r['perencanaan']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php } else { ?>
<h4 style="text-align: center;"><b><?= $label ?></b></h4>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Maintenance Aset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggaran Maintenance Gedung</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_anggaran_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Maintenance Aset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Terpakai Maintenance Gedung</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($hasil_terpakai_b,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggaran Maintenance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($anggaran_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Terpakai Maintenance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($terpakai_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cashback Maintenance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($cashback_global,0,"." , ".") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="tabel-data_bulanan" class="table table-striped table-bordered nowrap">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cabang</th>
                <th scope="col">Tgl Pengajuan</th>
                <th scope="col">Untuk Rencana</th>
                <th scope="col">Anggaran</th>
                <th scope="col">Tgl laporan</th>
                <th scope="col">Pemakaian</th>
                <th scope="col">Terpakai</th>
                <th scope="col">Cashback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($r = $q->fetch_assoc()) {
            $anggaran = $r['dana_anggaran'];
            $terpakai = $r['dana_terpakai'];
            $sisa = $anggaran - $terpakai;
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= ucwords($r['kategori']) ?> <?= ucwords($r['maintenance']) ?></td>
                <td style="text-align: center;"><?= ucwords($r['cabang']) ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pengajuan'])); ?></td>
                <td><?= ucwords($r['perencanaan']) ?></td>
                <td>Rp. <?= number_format($anggaran,0,"." , ".") ?></td>
                <td style="text-align: center;">
                    <?= date('d-m-Y', strtotime($r['tgl_pemakaian'])); ?></td>
                <td><?= ucwords($r['deskripsi_pemakaian']) ?></td>
                <td>Rp. <?= number_format($terpakai,0,"." , ".") ?></td>
                <td>Rp. <?= number_format($sisa,0,"." , ".") ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr style="text-align: center;">
                <th colspan="5">Total Anggaran</th>
                <th></th>
                <th colspan="2">Total Pemakaian</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<?php } ?>

<div class="row card-bot mt-5">

    <?php if ($id_bulan == "01") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=01">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Januari 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "02") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=02">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Februari 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "03") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=03">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Maret 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "04") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=04">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    April 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "05") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=05">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Mei 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "06") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=06">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Juni 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "07") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=07">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Juli 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "08") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=08">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Agustus 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "09") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=09">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    September 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "10") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=10">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Oktober 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "11") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=11">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    November 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

    <?php if ($id_bulan == "12") { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    Laporan Global
                </div>
            </div>
        </a>
    </div>
    <?php } else { ?>
    <div class="col-lg-2 mb-4">
        <a href="<?= $_SESSION["username"] ?>.php?id_laporan=bulanan_2021&id_bulanan=<?= $key_bulanan ?>&id_bulan=12">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    Desember 2021
                </div>
            </div>
        </a>
    </div>
    <?php } ?>

</div>