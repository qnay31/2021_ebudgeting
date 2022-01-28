<?php  
require '../function.php';
session_start();
error_reporting(0);

if(isset($_POST["data_id"])){
	$data_id = $_POST["data_id"];
	$output = "";
	$q3 = mysqli_query($conn, "SELECT aset_yayasan.nama, galeri_aset.dokumentasi 

    FROM aset_yayasan
    JOIN galeri_aset ON galeri_aset.id_pengurus = aset_yayasan.id_pengurus WHERE aset_yayasan.id = '$data_id' AND galeri_aset.nomor_id = '$data_id' ");
    
    
    $query = mysqli_query($conn, "SELECT * FROM aset_yayasan WHERE id = '$data_id' ");
    $hasil = mysqli_fetch_assoc($query);
    $deskripsi = $hasil["pemakaian"];
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
        <img src="../img/laporan/aset/'.$data["dokumentasi"].' " alt="">
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