<?php
include '../config.php';
if (!isset($_SESSION['tai_khoan'])) {
	header("location: ../dang-nhap.php");
} else {
    //Tạo, chỉnh sửa, xóa
    if (isset($_POST['lenh'])) {
        switch($_POST['lenh']) {
            //Tạo
            case 1:
                mysqli_query($conn, "insert into goi_nha_hang(so_luong, gia, ma_nha_hang) values (" . $_POST['so_luong'] . ", " . $_POST['gia'] . ", " . $_POST['ma_nha_hang'] . ")");
                mysqli_insert_id($conn);
                break;
            //Chỉnh sửa
            case 2:
                mysqli_query($conn, "update goi_nha_hang set so_luong = " . $_POST['so_luong'] . ", gia=" . $_POST['gia'] . " where ma= " . $_POST['ma']);
                mysqli_insert_id($conn);
                break;
            case 3:
                mysqli_query($conn, "delete from goi_nha_hang where ma = " . $_POST['ma']);
                mysqli_insert_id($conn);
                break;
        }
        header("location: ../nha-hang.php");
    }
}