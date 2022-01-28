$(".toggle-password").click(function () {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

// validasi program, logistik, humas, edit
function validasi_input(form) {

    //validasi dimulai
    if (form.program.value == "") {
        alert("Form ini tidak boleh kosong!");
        form.program.focus();
        return (false);

    } else if (form.tanggal.value == "") {
        alert("Tanggal Pengajuan Harus Diisi!");
        form.tanggal.focus();
        return (false);
    } else if (form.deskripsi.value == "") {
        alert("Deskripsi Harus Diisi!");
        form.deskripsi.focus();
        return (false);
    } else if (form.anggaran.value == "") {
        alert("Alokasi Dana Harus Diisi!");
        form.anggaran.focus();
        return (false);
    }
}

// validasi laporan program, logistik, humas, edit
function validasi_input2(form) {

    //validasi dimulai
    if (form.tanggal_laporan.value == "") {
        alert("Tanggal Laporan Harus Diisi!");
        form.tanggal_laporan.focus();
        return (false);
    } else if (form.deskripsi_laporan.value == "") {
        alert("Deskripsi Laporan Harus Diisi!");
        form.deskripsi_laporan.focus();
        return (false);
    } else if (form.dana_laporan.value == "") {
        alert("Pemakaian Dana Harus Diisi!");
        form.dana_laporan.focus();
        return (false);
    }
}

// validasi daily
function validasi_input3(form) {
    var minchars = 5;
    //validasi dimulai
    if (form.tanggal.value == "") {
        alert("Tanggal Aktivitas Harus Diisi!");
        form.tanggal.focus();
        return (false);
    } else if (form.aktivitas.value == "") {
        alert("Aktivitas Harus Diisi!");
        form.aktivitas.focus();
        return (false);
    } else if (form.aktivitas.value.length < minchars) {
        alert("Aktivitas Minimal 5 Huruf!");
        form.aktivitas.focus();
        return (false);
    } else if (form.deskripsi.value == "") {
        alert("Deskripsi Harus Diisi!");
        form.deskripsi.focus();
        return (false);
    }
}

// validasi input
function validasi_user(form) {
    var minchars = 5;
    //validasi dimulai
    if (form.username.value == "") {
        alert("Username TIdak Boleh Kosong!");
        form.username.focus();
        return (false);
    } else if (form.username.value.length < minchars) {
        alert("Username Minimal 5 Karakter!");
        form.username.focus();
        return (false);
    }
}

function validasi_ubahpw(form) {
    var minchars = 5;
    //validasi dimulai
    if (form.password_lama.value == "") {
        alert("Password Lama Harus Diisi!");
        form.password_lama.focus();
        return (false);
    } else if (form.password_baru.value == "") {
        alert("Password Baru Harus Diisi!");
        form.password_baru.focus();
        return (false);
    } else if (form.password_baru.value.length < minchars) {
        alert("Password Baru Minimal 5 Huruf!");
        form.password_baru.focus();
        return (false);
    } else if (form.konfirmasi_password.value == "") {
        alert("Konfirmasi Password Harus Diisi!");
        form.konfirmasi_password.focus();
        return (false);
    }

}

// validasi profil
function validasi_profil(form) {
    //validasi dimulai
    if (form.nama.value == "") {
        alert("Nama TIdak Boleh Kosong!");
        form.nama.focus();
        return (false);
    } 
}

// validasi pemasukan
function validasi_income(form) {
    //validasi dimulai
    if (form.tanggal.value == "") {
        alert("Tanggal Pengambilan Harus Diisi!");
        form.tanggal.focus();
        return (false);
    } else if (form.lokasi.value == "") {
        alert("Lokasi Pengambilan Harus Diisi!");
        form.lokasi.focus();
        return (false);
    } else if (form.jumlah.value == "") {
        alert("Jumlah Pengambilan Harus Diisi!");
        form.jumlah.focus();
        return (false);
    } else if (form.income.value == "") {
        alert("Income Harus Diisi!");
        form.income.focus();
        return (false);
    }
}


// validasi media sosial
function validasi_media(form) {
    //validasi dimulai
    if (form.gedung.value == "") {
        alert("Gedung Harus Pilih Salah Satu!");
        form.gedung.focus();
        return (false);
    } else if (form.tanggal.value == "") {
        alert("Tanggal Income Harus Diisi!");
        form.tanggal.focus();
        return (false);
    } else if (form.income.value == "") {
        alert("Income Harus Diisi!");
        form.income.focus();
        return (false);
    }
}

// validasi huruf dan angka
$(document).ready(function () {

    $('#alpabet').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9 /,-. )(]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#alpabet2').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9 /,-. )(]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#alpabet3').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9_-]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#password-field').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#password-field2').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#password-field3').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });

    $('#alpabet_user').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9_-]/g, function (str) {
            alert('Kamu menulis " ' + str + ' ".\n\ dimohon huruf dan angka saja.');
            return '';
        }));
    });
})

$("#alpabet_user").on({
    keydown: function (e) {
        if (e.which === 32)
            return false;
    },
    keyup: function () {
        this.value = this.value.toLowerCase();
    },
    change: function () {
        this.value = this.value.replace(/\s/g, "");

    }
})

// no hp

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : e.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}

// rupiah
var rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function () {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}

var rupiah2 = document.getElementById('rupiah2');
rupiah2.addEventListener('keyup', function () {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah2(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}

function Hitung() {

    var curText = document.ubah_pw.password_baru.value.length;


    var maxText = 20;

    var sisa = maxText - curText;

    var isi = document.getElementById('asalbagus');
    isi.innerHTML = '(Sisa Karakter : ' + sisa + '/20)';

}

function Hitung2() {

    var curText2 = document.ubah_pw.konfirmasi_password.value.length;


    var maxText2 = 20;

    var sisa2 = maxText2 - curText2;

    var isi2 = document.getElementById('asalbagus2');
    isi2.innerHTML = '(Sisa Karakter : ' + sisa2 + '/20)';

}