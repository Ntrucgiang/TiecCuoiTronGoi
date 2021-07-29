<?php
include '../config.php';
if (!isset($_SESSION['tai_khoan'])) {
	header("location: ../dang-nhap.php");
} else {
    //Tạo, chỉnh sửa, xóa
    if (isset($_POST['lenh'])) {
        $mo_kinh_doanh = 0;
        if (isset($_POST['mo_kinh_doanh']))
            $mo_kinh_doanh = 1;
        switch($_POST['lenh']) {
            //Tạo
            case 1:
                mysqli_query($conn, "insert into nha_hang(ten, slogan, dia_chi, sdt, mo_kinh_doanh) values ('" . $_POST['ten'] . "', '" . $_POST['slogan'] . "', '" . $_POST['dia_chi'] . "', " . $_POST['sdt'] . ", " . $mo_kinh_doanh . ")");
                $ma = mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/nha_hang/nhahang' . $ma . '.png');
                break;
            //Chỉnh sửa
            case 2:
                mysqli_query($conn, "update nha_hang set ten='" . $_POST['ten'] . "', slogan='" . $_POST['slogan'] . "', dia_chi='" . $_POST['dia_chi'] . "', sdt= " . $_POST['sdt'] . ", mo_kinh_doanh= " . $mo_kinh_doanh . " where ma=" . $_POST['ma']);
                mysqli_insert_id($conn);
                if (isset($_FILES["anh"]))
                    move_uploaded_file($_FILES["anh"]["tmp_name"], __DIR__ . '/../hinh/nha_hang/nhahang' . $_POST['ma'] . '.png');
                break;
            case 3:
                mysqli_query($conn, "delete from goi_nha_hang where ma_nha_hang=" . $_POST['ma']);
                mysqli_insert_id($conn);
                mysqli_query($conn, "delete from nha_hang where ma=" . $_POST['ma']);
                mysqli_insert_id($conn);
                unlink(__DIR__ . '/../hinh/nha_hang/nhahang' . $_POST['ma'] . '.png');
                break;
        }
        header("location: ../nha-hang.php");
    }
}