<?php  
require '../function.php';
error_reporting(0);

if(isset($_POST["data_id"])){
	$data_id = $_POST["data_id"];
	$data_name = $_POST["data_name"];
	$output = "";
	$q3 = mysqli_query($conn, "SELECT daily_report.nama, galeri_daily.dokumentasi 

    FROM daily_report
    JOIN galeri_daily ON galeri_daily.id_pengurus = daily_report.id_pengurus WHERE daily_report.id = '$data_id' AND galeri_daily.nomor_id = '$data_id' AND galeri_daily.id_pengurus = '$data_name' AND daily_report.id_pengurus = '$data_name' ");
  
  $query = mysqli_query($conn, "SELECT * FROM daily_report WHERE id = '$data_id' ");
  $hasil = mysqli_fetch_assoc($query);
  $deskripsi = $hasil["deskripsi"];
  $new_desk   = ucwords($deskripsi);
    
    // die(var_dump($s3));
    $output .= '
    <div class="table-responsive">  
        <div class="owl-carousel owl-theme">'; 
	$output .= 
    $i = "Daily Report $new_desk";
    $sql = $q3;
    while($data = mysqli_fetch_array($sql))
    {
        $output .= '  
        <div class="item">  
        <img src="../img/laporan/daily/'.$data["dokumentasi"].' " alt="">
        </div> 
        ';    
    } 
    $output .= "
	</div>
    </div>";  

    echo $output;  
    }

?>

<script>
$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
})
</script>