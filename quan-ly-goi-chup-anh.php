<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location: dang-nhap.php");
} else {
    $lenh = 1;
    $ma = 0;
    $ten = '';
    $gia = '';
    $cong_cu = '';
    $san_pham = '';
    $mo_kinh_doanh = 1;
    $ma_chup_anh = isset($_GET['ma_chup_anh']) ? $_GET['ma_chup_anh'] : '';
    if (isset($_GET['ma'])) {
        $ao_cuoi = $conn->query("select ma, ten, gia, cong_cu, san_pham, mo_kinh_doanh from goi_chup_anh where ma = " . $_GET['ma']);
        $row = $ao_cuoi->fetch_assoc();
        $lenh = 2;
        $ma = $row['ma'];
        $ten = $row['ten'];
        $gia = $row['gia'];
        $cong_cu = $row['cong_cu'];
        $san_pham = $row['san_pham'];
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
        <form action="controllers/controller-goi-chup-anh.php" method="post">
            <input type="hidden" name="lenh" value="3" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">XÓA GÓI CHỤP ẢNH CƯỚI</h4>
                <h4  class="text-center text-danger"><?= $ten?></h4>
                <div class="col-xs-12 col-sm-6 text-center">
                    <h6 class="d-inline text-danger">Giá tiền: </h6>
                    <p class="d-inline text-primary"><?=number_format($gia)?>đ</p>
                    <h5 class="text-center">Bao gồm:</h5>
                    <div class="d-flex justify-content-center">
                        <div class="mb-2">
                            <?php
                            $cong_cus = explode("\r\n", $cong_cu);
                            foreach ($cong_cus as $cong_cu) {
                            ?>
                                <div class="text-sp"><?=$cong_cu ?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <h5 class="text-danger text-center">Sản phẩm nhận được: </h5>
                    <div class="d-flex justify-content-center">
                        <div class="mb-2">
                            <?php
                            $san_phams = explode("\r\n", $san_pham);
                            foreach ($san_phams as $san_pham) {
                            ?>
                                <div class="text-sp"><?=$san_pham ?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div><button class="btn btn-chon mb-4">Xóa</button></div>
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
        <form action="controllers/controller-goi-chup-anh.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="lenh" value="<?= $lenh?>" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <input type="hidden" name="ma_chup_anh" value="<?= $ma_chup_anh?>" /><br/>
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">
                <?php
                    if (isset($_GET['ma']))
                        echo 'SỬA THÔNG GÓI CHỤP ẢNH';
                    else
                        echo 'THÊM GÓI CHỤP ẢNH';
                    ?></h4>
                <div class="col-xs-3 col-sm-7">
                    <table class="table text-danger">
                        <tr>
                            <th>Thêm ảnh: </th>
                            <td><input name="anh" type="file" accept="image/jpeg, image/png" /></td>
                        </tr>
                        <tr>
                            <th > Tên gói chụp: </th>
                            <td><input name="ten" value="<?= $ten?>" /></td>
                        </tr>
                        <tr>
                            <th>Giá: </th>
                            <td><input name="gia" value="<?=$gia?>" />đ</td>
                        </tr>
                        <tr>
                            <th>Hỗ trợ: </th>
                            <td><textarea rows="4" cols="50" name="cong_cu"><?= $cong_cu?></textarea></td>
                        </tr>
                        <tr>
                            <th>Sản phẩm: </th>
                            <td><textarea rows="4" cols="50" name="san_pham"><?= $san_pham?></textarea></td>
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
