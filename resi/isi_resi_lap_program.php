<?php  
require '../function.php';
error_reporting(0);

if(isset($_POST["data_id"])){
	$data_id = $_POST["data_id"];
	$output = "";
	$q3 = mysqli_query($conn, "SELECT program.nama, program.nama, galeri_program.dokumentasi 

    FROM program
    JOIN galeri_program ON galeri_program.id_pengurus = program.id_pengurus WHERE program.id = '$data_id' AND galeri_program.nomor_id = '$data_id'");

    $query = mysqli_query($conn, "SELECT * FROM program WHERE id = '$data_id' ");
    $hasil = mysqli_fetch_assoc($query);
    $deskripsi = $hasil["deskripsi_pemakaian"];
    $new_desk   = ucwords($deskripsi);
    
    // die(var_dump($s3));
    $output .= '
    <div class="table-responsive">  
        <div class="owl-carousel owl-theme">'; 
	$output .= 
    $i = "Bukti Resi $new_desk";
    $sql = $q3;
    while($data = mysqli_fetch_array($sql))
    {
        $output .= ' 
        <div class="item">  
        <img src="../img/laporan/program/'.$data["dokumentasi"].' " alt="">
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