<?php
include '../config.php';
if(isset($_POST['ma'])) {
    $ma = $_POST['ma'];
    $ao_cuoi = $_SESSION['dich_vu']['ao_cuoi'];
    array_push($ao_cuoi, $ma);
    $_SESSION['dich_vu']['ao_cuoi'] = $ao_cuoi;
    header('Location: ../hoa-don.php');
}
?>