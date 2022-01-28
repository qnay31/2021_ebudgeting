<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengurus Yayasan</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 mb-4">
            <!-- Card Body -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                    <h6 class="m-0 font-weight-bold text-primary ">List Pengurus</h6>
                </div>
                <div class="card-body">
                    <!-- proghram -->
                    <?php if ($_GET["id_list"] == "program") { ?>
                    <?php include '../list/program.php'; ?>

                    <!-- logistik -->
                    <?php } elseif ($_GET["id_list"] == "logistik") { ?>
                    <?php include '../list/logistik.php'; ?>

                    <!-- humas -->
                    <?php } elseif ($_GET["id_list"] == "humas") { ?>
                    <?php include '../list/humas.php'; ?>

                    <!-- global -->
                    <?php } else { ?>
                    <?php include '../list/pengurus_all.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>