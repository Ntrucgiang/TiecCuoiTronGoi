<?php
include '../config.php';
if(isset($_POST['ma'])) {
    $ma = $_POST['ma'];
    $goi_nha_hang = $_SESSION['dich_vu']['goi_nha_hang'];
    array_push($goi_nha_hang, $ma);
    $_SESSION['dich_vu']['goi_nha_hang'] = $goi_nha_hang;
    header('Location: ../hoa-don.php');
}
?>