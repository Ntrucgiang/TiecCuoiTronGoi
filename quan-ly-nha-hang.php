<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location: dang-nhap.php");
} else {
    $lenh = 1;
    $ma = 0;
    $slogan = '';
    $ten = '';
    $dia_chi = '';
    $sdt = '';
    $so_luong='';
    $gia='';
    $mo_kinh_doanh = 1;
    if (isset($_GET['ma'])) {
        $nha_hang = $conn->query("select * from nha_hang where ma = " . $_GET['ma']);
        $row = $nha_hang->fetch_assoc();
        $lenh = 2;
        $ma = $row['ma'];
        $slogan = $row['slogan'];
        $ten = $row['ten'];
        $dia_chi = $row['dia_chi'];
        $sdt = $row['sdt'];
        $mo_kinh_doanh = $row['mo_kinh_doanh'];
    }
    if (isset($_GET['xoa'])) {

?>
        <style>
            .nen{
                background: url("hinh/nenhong.php");
            }
            .btn-chon{
                background-color: #0000FF;
                border-radius: 10px;
                padding: 1px 8px;
                margin-top: 10px;
                font-size: 16px;
                color: #fff;
            }
        </style>
        <form action="controllers/controller-nha-hang.php" method="post">
            <input type="hidden" name="lenh" value="3" />
            <input type="hidden" name="ma" value="<?= $ma?>" />
            <div class="row  justify-content-center mt-4">
                <h4 class="text-center">XÓA THÔNG TIN DỊCH VỤ</h4>
                <h4 class="text-center text-danger"><?= $ten?> </h4>
                <div class="col-xs-4 col-sm-6">
                    <table class="table text-danger">
                        <tr>
                            <td colspan="4" ><h6 class="text-center text-danger"><?= $slogan?></h6></td>
                        </tr>
                        <?php
                        $goi_nha_hangs = $conn->query("select nha_hang.ma as ma, nha_hang.slogan as slogan, nha_hang.ten as ten, nha_hang.dia_chi as dia_chi, nha_hang.sdt as sdt, goi_nha_hang.so_luong as so_luong, goi_nha_hang.gia as gia from nha_hang inner join goi_nha_hang on nha_hang.ma=goi_nha_hang.ma_nha_hang where nha_hang.ma = " . $_GET['ma']);
                        while($goi_nha_hang =$goi_nha_hangs->fetch_assoc()){   
                        ?>
                            <tr>
                                <th class="text-primary"> Số lượng: </th>
                                <td><?= $goi_nha_hang['so_luong']?> khách</td>
                                <th class="text-primary">Tổng tiền: </th>
                                <td><?=number_format($goi_nha_hang['gia'])?>đ</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="text-center">
                        <h6 class="d-inline">Địa chỉ: </h6>
                        <p class="d-inline text-primary"><?=$dia_chi?></p>
                    </div>
                    <div class="text-center">
                        <h6 class="d-inline ">Số điện thoại: </h6>
                        <p class=" d-inline text-primary "><?=$sdt?></p>
                    </div>
                    <div class="text-center"><button class="btn btn-chon mt-2 mb-4 ">Xóa</button></div>
                </div>
            </div>
        </form>
<?php
    } else {
?>
    <style>
        .nen{
                background: url("hinh/nenhong.php");
            }
        .btn-chon{
            background-color: #0033FF;
            border-radius: 10px;
            padding: 1px 8px;
            margin-top: 10px;
            font-size: 16px;
            color: #fff;
        }
    </style>
        <form action="controllers/controller-nha-hang.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="lenh" value="<?= $lenh?>" /><br/>
        <input type="hidden" name="ma" value="<?= $ma?>" /><br/>
            <div class="row nen justify-content-center mt-4">
                <h4 class="text-center text-danger">
                    <?php
                    if (isset($_GET['ma']))
                        echo 'CHỈNH SỬA THÔNG TIN NHÀ HÀNG';
                    else
                        echo 'THÊM NHÀ HÀNG MỚI';
                    ?>
                </h4>
                <div class="col-xs-4 col-sm-6">
                    <table class="table text-danger">
                        <tr>
                            <th>Thêm ảnh: </th>
                            <td><input name="anh" type="file" accept="image/jpeg, image/png" /></td>
                        </tr>
                        <tr>
                            <th>Tên nhà hàng:</th>
                            <td><input name="ten" value="<?= $ten?>" /></td>
                        </tr>
                        <tr>
                            <th> Slogan: </th>
                            <td><input name="slogan" value="<?= $slogan?>" /></td>
                        </tr>
                        <tr>
                            <th> Địa chỉ: </th>
                            <td><input name="dia_chi" value="<?= $dia_chi?>" /></td>
                        </tr>
                        <tr>
                            <th> Số điện thoại: </th>
                            <td><input name="sdt" type="number" value="<?= $sdt?>" /></td>
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
                                    echo 'SỬA';
                                else
                                    echo 'THÊM';
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
