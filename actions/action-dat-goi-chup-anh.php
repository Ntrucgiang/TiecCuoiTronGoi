<?php
    include '../config.php';
    if(isset($_POST['ma'])) {
        $ma = $_POST['ma'];
        $goi_chup_anh = $_SESSION['dich_vu']['goi_chup_anh'];
        array_push($goi_chup_anh, $ma);
        $_SESSION['dich_vu']['goi_chup_anh'] = $goi_chup_anh;
        header('Location: ../hoa-don.php');
    }
?> 