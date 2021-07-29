<?php
include '../config.php';
$_SESSION['dich_vu'] = [
    'goi_nha_hang' => [],
    'ao_cuoi' => [],
    'goi_chup_anh' => [],
];
header('Location: ../hoa-don.php');
?>