<?php
header('Content-Type: application/json; charset=utf8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require '../function.php';

$query2  = mysqli_query($conn, "SELECT * FROM data_maintenance");

$array2=array();
while($data2=mysqli_fetch_assoc($query2))
$array2[]=$data2;

 //mengubah data array menjadi format json
echo json_encode($array2);

?>