<?php
include '../config.php';
if (isset($_POST["xep_hang"]) && isset($_POST["noi_dung"])){
    $xep_hang=$_POST["xep_hang"];
    $noi_dung=$_POST["noi_dung"];
    $ten = $_POST["ten"];
    $sql ="insert into danh_gia(ten, xep_hang, noi_dung) values ('$ten',$xep_hang, '$noi_dung''$name')";
    $result=mysqli_query($conn,$sql);
    header("location:../danh-gia.php"); 
}
$conn-> close();
?>