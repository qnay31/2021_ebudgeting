<?php

if (isset($_POST["input"]) ) {
    $link = $_SESSION["username"];
    if(gabung_income($_POST) > 0 ) {
            echo "<script>
                    alert('Data Income Berhasil Digabung');
                    document.location.href = '../user/$link.php?id_edit=gabung_income';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }
    }

$none   = "B";
$q  = mysqli_query($conn, "SELECT * FROM income WHERE gedung = '$none' ");
$s  = $q->num_rows;

$none   = "D";
$q2  = mysqli_query($conn, "SELECT * FROM income WHERE gedung = '$none' ");
$s2  = $q2->num_rows;

// die(var_dump($s));
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center" id="page">
            <ul class="pagination shadow-lg">
                <?php if ($s2 == 0) { ?>
                <li class="page-item active"><a class="page-link" href="<?= $_SESSION["username"] ?>.php">
                        <small class="text-white">Home&nbsp;
                        </small>
                    </a></li>
                <?php } else { ?>
                <li class="page-item active"><a class="page-link"
                        href="<?= $_SESSION["username"] ?>.php?id_edit=gabung_income">
                        <small class="text-white">Edit Income Gedung&nbsp;
                        </small>
                    </a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card shadow">
            <div class="card-body">
                <?php if ($s2 == 0) { ?>
                <label for="">
                    <div class="text-center">
                        <h1><b>Tidak Ada Lagi Penggabungan Data Income</b></h1>
                    </div>
                </label>
                <?php } else { ?>
                <label for=""><b>Gabungkan Income</b>
                    <hr>
                </label>
                <form action="" method="post" onsubmit="return validasi_gabung(this)">
                    <div class="mb-3">
                        <div id="disabledSelect" class="form-text mb-2">
                            Data Income
                        </div>
                        <input type="hidden" name="link" value="<?= $pengurus_id ?>">
                        <input type="hidden" name="posisi" value="<?= $posisi ?>">
                        <?php if ($s == 0) { ?>
                        <select class="custom-select" aria-label="Default select example" name="gedung" id="gedung"
                            required oninvalid="this.setCustomValidity('Pilih salah satu dari gedung ini')"
                            oninput="this.setCustomValidity('')">
                            <option selected value="">Pilih Salah Satu Gedung</option>
                            <option value="C">Gedung C</option>
                            <option value="D">Gedung D</option>
                        </select>
                        <?php } else { ?>
                        <select class="custom-select" aria-label="Default select example" name="gedung" id="gedung"
                            required oninvalid="this.setCustomValidity('Pilih salah satu dari gedung ini')"
                            oninput="this.setCustomValidity('')">
                            <option selected value="">Pilih Salah Satu Gedung</option>
                            <option value="A">Gedung A</option>
                            <option value="B">Gedung B</option>
                        </select>
                        <?php } ?>
                    </div>

                    <div id="disabledSelect" class="form-text mb-2">
                        Digabung Dengan Gedung
                    </div>

                    <div class="form-group disabled" id="income_gabung">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>