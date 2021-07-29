<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location:dang-nhap.php");
} else {
    $lenh = 1;
    $ma = 0; 
    $ten_ao='';
    $ten = '';
    $gia = '';
    $mo_kinh_doanh = 1;
    $ma_loai_ao_cuoi = isset($_GET['ma_loai_ao_cuoi']) ? $_GET['ma_loai_ao_cuoi'] : '';
    if (isset($_GET['ma'])) {
        $ao_cuoi = $conn->query("select loai_ao_cuoi.ten as ten_ao, ao_cuoi.ma as ma, ao_cuoi.ten as ten, ao_cuoi.gia as gia, ao_cuoi.mo_kinh_doanh as mo_kinh_doanh from ao_cuoi inner join loai_ao_cuoi on ao_cuoi.ma_loai_ao_cuoi=loai_ao_cuoi.ma where ao_cuoi.ma = " . $_GET['ma']);
        $row = $ao_cuoi->fetch_assoc();
        $lenh = 2;
        $ma = $row['ma'];
        $ten = $row['ten'];
        $gia = $row['gia'];
        $ten_ao=$row['ten_ao'];
        $mo_kinh_doanh = $row['mo_kinh_doanh'];
    }
    if (isset($_GET['xoa'])) {
?>
       <style>
            .btn-chon{
                background-color: #0033FF;
                border-radius: 10px;
                padding: 1px 8px;
                margin-top: 10px;
                font-size: 16px;
                color: #fff;
            }
        </style>
        <form action="controllers/controller-ao-cuoi.php" method="post">
            <input type="hidden" name="lenh" value="3" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">XÓA ÁO CƯỚI</h4>
                <h4 class="text-center text-primary"><?= $ten_ao?> </h4>
                <div class="col-xs-4 col-sm-4">
                    <table class="table text-danger">
                        <tr>
                            <th>Tên áo cưới: </th>
                            <td><?= $ten?></td>
                        </tr>
                        <tr>
                            <th>Giá: </th>
                            <td><?=number_format($gia)?>đ</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center"><button class="btn btn-chon mt-2 mb-4">Xóa</button></th>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
<?php
    } else {
?>
<style>
    .btn-chon{
            background-color: #0033FF;
            border-radius: 10px;
            padding: 1px 8px;
            margin-top: 10px;
            font-size: 16px;
            color: #fff;
        }
</style>
        <form action="controllers/controller-ao-cuoi.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="lenh" value="<?= $lenh?>" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <input type="hidden" name="ma_loai_ao_cuoi" value="<?= $ma_loai_ao_cuoi?>" /><br/>
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">
                <?php
                    if (isset($_GET['ma']))
                        echo 'SỬA THÔNG TIN ÁO CƯỚI';
                    else
                        echo 'THÊM ÁO CƯỚI';
                    ?></h4>

                <h4 class="text-center text-primary"><?=$ten_ao?></h4>
                <div class="col-xs-4 col-sm-6">
                    <table class="table text-danger">
                        <tr>
                            <th>Thêm ảnh: </th>
                            <td><input name="anh" type="file" accept="image/jpeg, image/png" /></td>
                        </tr>
                        <tr>
                            <th > Tên áo cưới: </th>
                            <td><input name="ten" value="<?= $ten?>" /></td>
                        </tr>
                        <tr>
                            <th>Giá: </th>
                            <td><input name="gia" value="<?=$gia?>" />đ</td>
                        </tr>
                        <tr>
                            <th> Mở kinh doanh: </th>
                            <td><input name="mo_kinh_doanh" type="checkbox" value="1" <?=$mo_kinh_doanh == 1 ? 'checked' : ''?>/></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <button class="btn btn-chon mt-2 mb-4">
                                <?php
                                if (isset($_GET['ma']))
                                    echo 'Sửa';
                                else
                                    echo 'Thêm';
                                ?>

                                </button>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
<?php
    }
}
?>
<?php
include 'include/footer.php';
?>
