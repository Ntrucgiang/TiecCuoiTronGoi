<?php
include '../config.php';
if (!isset($_SESSION['tai_khoan'])) {
	header("location: ../dang-nhap.php");
} else {
    //Tạo, chỉnh sửa, xóa
    if (isset($_POST['lenh'])) {
        $cong_cu = $_POST['cong_cu'];
        $san_pham = $_POST['san_pham'];
        $mo_kinh_doanh = 0;
        if (isset($_POST['mo_kinh_doanh']))
            $mo_kinh_doanh = 1;
        switch($_POST['lenh']) {
            //Tạo
            case 1:
                mysqli_query($conn, "insert into goi_chup_anh(ten, gia, cong_cu, san_pham, ma_chup_anh, mo_kinh_doanh) values ('" . $_POST['ten'] . "', " . $_POST['gia'] . ", '" . $cong_cu . "', '" . $cong_cu . "', " . $_POST['ma_chup_anh'] . ", " . $mo_kinh_doanh . ")");
                $ma = mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/nhiep_anh/chup' . $ma . '.png');
                break;
            //Chỉnh sửa
            case 2:
                mysqli_query($conn, "update goi_chup_anh set ten = '" . $_POST['ten'] . "', gia=" . $_POST['gia'] . ", cong_cu = '" . $cong_cu . "', san_pham='" . $san_pham . "', mo_kinh_doanh= " . $mo_kinh_doanh. " where ma= " . $_POST['ma']);
                mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/nhiep_anh/chup' . $_POST['ma'] . '.png');
                break;
            case 3:
                mysqli_query($conn, "delete from goi_chup_anh where ma = " . $_POST['ma']);
                mysqli_insert_id($conn);
                unlink(__DIR__ . '/../hinh/nhiep_anh/chup' . $_POST['ma'] . '.png');
                break;
        }
        header("location: ../nhiep-anh.php");
    }
}