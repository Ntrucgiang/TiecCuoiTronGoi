<?php
include '../config.php';
if (isset($_POST['noi_dung']) && isset($_POST['ma_danh_gia'])) {
    $noi_dung = $_POST['noi_dung'];
    $ma_danh_gia = $_POST['ma_danh_gia'];
    $sql ="insert into danh_gia( ma_danh_gia, noi_dung) values ($ma_danh_gia,'$noi_dung')";
    $result=mysqli_query($conn,$sql);
    header('Location: ../danh-gia.php');
}

$conn-> close();
?>