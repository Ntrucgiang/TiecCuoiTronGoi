<?php
include '../config.php';
if (!isset($_SESSION['tai_khoan'])) {
	header("location:../dang-nhap.php");
} else {
    //Tạo, chỉnh sửa, xóa
    if (isset($_POST['lenh'])) {
        $mo_kinh_doanh = 0;
        if (isset($_POST['mo_kinh_doanh']))
            $mo_kinh_doanh = 1;
        switch($_POST['lenh']) {
            //Tạo
            case 1:
                mysqli_query($conn, "insert into ao_cuoi(ten, gia, ma_loai_ao_cuoi, mo_kinh_doanh) values ('" . $_POST['ten'] . "', " . $_POST['gia'] . ", " . $_POST['ma_loai_ao_cuoi'] . ", " . $mo_kinh_doanh . ")");
                $ma = mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/ao_cuoi/aocuoi' . $ma . '.png');
                break;
            //Chỉnh sửa
            case 2:
                mysqli_query($conn, "update ao_cuoi set ten = '" . $_POST['ten'] . "', gia=" . $_POST['gia'] . ", mo_kinh_doanh= " . $mo_kinh_doanh . " where ma= " . $_POST['ma']);
                mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/ao_cuoi/aocuoi' . $_POST['ma'] . '.png');
                break;
            case 3:
                mysqli_query($conn, "delete from ao_cuoi where ma = " . $_POST['ma']);
                mysqli_insert_id($conn);
                unlink(__DIR__ . '/../hinh/ao_cuoi/aocuoi' . $_POST['ma'] . '.png');
                break;
        }
        header("location: ../ao-cuoi.php");
    }
}