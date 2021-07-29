<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location: dang-nhap.php");
} else {
    $ma_hoa_don = $_GET['ma'];
    $hoa_dons = mysqli_query($conn, "select * from hoa_don where ma = " . $ma_hoa_don);
    $hoa_don = $hoa_dons->fetch_assoc();
?>
    <style>
        .text{
            color:#3300FF;
            font-weight:bold
            
        }
        .text-table{
            color:crimson; 
        }
    </style>
    <div class="row hoadon ">
        <div class="col">
            <!--hoa don-->
            <div class="row text-danger">
                <div class="col">
                    <h4 class="text-center text-danger mt-4">CHI TIẾT HÓA ĐƠN</h4>
                    <p class="text-center text">Khách hàng: <?=$hoa_don['ten']?></p>
                    <p class="text-center text">Số điện thoại:  <?=$hoa_don['sdt']?></p>
                    <p class="text-center text">Email: <?=$hoa_don['email']?></p>
                </div>
            </div>
            <!--Bang nha hang-->
            <div class="row justify-content-center mb-4">
                <div class="col-9">
                    <table class="table text-table table-bordered border-danger">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">Nhà hàng</th>
                            </tr>
                            <tr>
                                <th>STT</th>
                                <th>Tên nhà hàng</th>
                                <th>Sức chứa tối đa</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tong_tien = 0;
                            $dich_vu_goi_nha_hangs = mysqli_query($conn, "select ma_goi_nha_hang from hoa_don_goi_nha_hang where ma_hoa_don = " . $ma_hoa_don);
                            $i = 1;
                            $tong = 0;
                            while ($dich_vu_goi_nha_hang = $dich_vu_goi_nha_hangs->fetch_assoc()) {
                                $goi_nha_hangs = mysqli_query($conn, "select nha_hang.ten as ten_nha_hang, so_luong, gia from goi_nha_hang inner join nha_hang on goi_nha_hang.ma_nha_hang = nha_hang.ma where goi_nha_hang.ma = " . $dich_vu_goi_nha_hang['ma_goi_nha_hang']);
                                $goi_nha_hang = $goi_nha_hangs->fetch_assoc();
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$goi_nha_hang['ten_nha_hang']?></td>
                                <td><?=$goi_nha_hang['so_luong']?></td>
                                <td><?=number_format($goi_nha_hang['gia'])?>đ</td>
                            </tr>
                            <?php
                            $tong += $goi_nha_hang['gia'];
                            $i++;
                            }
                            $tong_tien += $tong;
                            ?>
                            <tr>
                                <th>Tổng tiền</th>
                                <th colspan="3" class="text-center"><?=number_format($tong)?>đ</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--Bang ao cuoi-->
            <div class="row justify-content-center mb-4">
                <div class="col-9">
                    <table class="table text-table table-bordered border-danger">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">Áo cưới</th>
                            </tr>
                            <tr>
                                <th>STT</th>
                                <th>Loại áo cưới</th>
                                <th>tên áo cưới</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $dich_vu_ao_cuois = mysqli_query($conn, "select ma_ao_cuoi from hoa_don_ao_cuoi where ma_hoa_don = " . $ma_hoa_don);
                        $i = 1;
                        $tong = 0;
                        while ($dich_vu_ao_cuoi = $dich_vu_ao_cuois->fetch_assoc()) {
                            $ao_cuois = mysqli_query($conn, "select loai_ao_cuoi.ten as loai_ao, ao_cuoi.ten as ten_ao_cuoi, gia from ao_cuoi inner join loai_ao_cuoi on ao_cuoi.ma_loai_ao_cuoi= loai_ao_cuoi.ma where ao_cuoi.ma = " . $dich_vu_ao_cuoi['ma_ao_cuoi']);
                            $ao_cuoi = $ao_cuois->fetch_assoc();
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td>Hệ thống cửa hàng áo cưới Trúc Giang</td>
                                <td><?=$ao_cuoi['ten_ao_cuoi']?></td>
                                <td><?=number_format($ao_cuoi['gia'])?>đ</td>
                            </tr>
                            <?php
                            $tong += $ao_cuoi['gia'];
                            $i++;
                            }
                            $tong_tien += $tong;
                            ?>
                            <tr>
                                <th>Tổng tiền</th>
                                <th colspan="3" class="text-center"><?=number_format($tong)?>đ</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--Bang ao cuoi-->
            <div class="row justify-content-center mb-2">
                <div class="col-9">
                    <table class="table text-table table-bordered border-danger">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">Gói chụp ảnh</th>
                            </tr>
                            <tr>
                                <th>STT</th>
                                <th>Nhà cung cấp dịch vụ</th>
                                <th>Gói chụp ảnh</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $dich_vu_goi_chup_anhs = mysqli_query($conn, "select ma_goi_chup_anh from hoa_don_goi_chup_anh where ma_hoa_don = " . $ma_hoa_don);
                            $i = 1;
                            $tong = 0;
                            while ($dich_vu_chup_anh = $dich_vu_goi_chup_anhs->fetch_assoc()) {
                                $goi_chup_anhs = mysqli_query($conn, "select chup_anh.ten as ten_chup_anh, goi_chup_anh.ten as ten, gia from goi_chup_anh inner join chup_anh on goi_chup_anh.ma_chup_anh = chup_anh.ma where goi_chup_anh.ma = " . $dich_vu_chup_anh['ma_goi_chup_anh']);
                                $goi_chup_anh = $goi_chup_anhs->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$goi_chup_anh['ten']?></td>
                                    <td><?=$goi_chup_anh['ten']?></td>
                                    <td><?=number_format($goi_chup_anh['gia'])?>đ</td>
                                </tr>
                            <?php
                            $tong += $goi_chup_anh['gia'];
                            $i++;
                            }
                            $tong_tien += $tong;
                            ?>
                            <tr>
                                <th>Tổng tiền</th>
                                <th colspan="3" class="text-center"><?=number_format($tong)?>đ</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h5 class="text-center text-primary">Tổng tiền dịch vụ: <?=number_format($tong_tien)?>đ</h5>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
include 'include/footer.php';
?>
