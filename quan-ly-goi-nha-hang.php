<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location: dang-nhap.php");
} else {
    $lenh = 1;
    $ma = 0;
    $ten = '';
    $so_luong = '';
    $gia = '';
    $ma_nha_hang = isset($_GET['ma_nha_hang']) ? $_GET['ma_nha_hang'] : '';
    if (isset($_GET['ma'])) {
        $nha_hang = $conn->query("select nha_hang.ten as ten, goi_nha_hang.ma as ma, goi_nha_hang.so_luong as so_luong, goi_nha_hang.gia as gia from goi_nha_hang inner join nha_hang on nha_hang.ma = goi_nha_hang.ma_nha_hang where goi_nha_hang.ma = " . $_GET['ma']);
        $row = $nha_hang->fetch_assoc();
        $lenh = 2;
        $ma = $row['ma'];
        $ten = $row['ten'];
        $so_luong = $row['so_luong'];
        $gia = $row['gia'];
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
        <form action="controllers/controller-goi-nha-hang.php" method="post">
            <input type="hidden" name="lenh" value="3" />
            <input type="hidden" name="ma" value="<?=$ma?>" />
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">XÓA GÓI TIỆC CƯỚI</h4>
                <h4 class="text-center text-danger"><?= $ten?> </h4>
                <div class="col-xs-4 col-sm-4">
                    <table class="table text-danger">
                        <tr>
                        <th> Số lượng: </th>
                            <td><?= $so_luong?> khách</td>
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
        <form action="controllers/controller-goi-nha-hang.php" method="post">
            <input type="hidden" name="lenh" value="<?= $lenh?>" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <input type="hidden" name="ma_nha_hang" value="<?= $ma_nha_hang?>" /><br/>
            <div class="row justify-content-center mt-4">
                <h4 class="text-center text-danger">
                <?php
                    if (isset($_GET['ma']))
                        echo 'SỬA GÓI TIỆC';
                    else
                        echo 'THÊM GÓI TIỆC';
                    ?></h4>

                <h4 class="text-center"><?=$ten?></h4>
                <div class="col-xs-4 col-sm-5">
                    <table class="table text-danger">
                        <tr>
                            <th> Số lượng: </th>
                            <td><input name="so_luong" value="<?= $so_luong?>" />Khách</td>
                        </tr>
                        <tr>
                            <th>Giá: </th>
                            <td><input name="gia" value="<?=$gia?>" />đ</td>
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
