<?php
include 'include/header.php';
?>
    <style>
    .hoadon{
        background: url("hinh/nenhong.png") top center no-repeat;
    }
    .btn-hoadon{
        text-align: center;
        background: #F778A1;
        color: #FFF;
        font-weight: bold;
        padding: 5px 13px;
        border-radius: 13px;
    }
    .text{
        color:crimson; 
        padding-top:30px; 
        font-weight:bold
    }
    .text-table{
        color:crimson; 
    }
    </style>
    <div class="row hoadon ">
        <div class="col">
            <!--hoa don-->
            <div class="row">
                <div class="col">
                    <h4 class="text-center text mb-4">HÓA ĐƠN ĐẶT DỊCH VỤ</h4>
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
                            $dich_vu_goi_nha_hangs = $_SESSION['dich_vu']['goi_nha_hang'];
                            $i = 1;
                            $tong = 0;
                            foreach ($dich_vu_goi_nha_hangs as $ma) {
                                $goi_nha_hangs = mysqli_query($conn, "select nha_hang.ten as ten_nha_hang, so_luong, gia from goi_nha_hang inner join nha_hang on goi_nha_hang.ma_nha_hang = nha_hang.ma where goi_nha_hang.ma = " . $ma);
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
                        $dich_vu_ao_cuois = $_SESSION['dich_vu']['ao_cuoi'];
                        $i = 1;
                        $tong = 0;
                        foreach ($dich_vu_ao_cuois as $ma) {
                            $ao_cuois = mysqli_query($conn, "select loai_ao_cuoi.ten as loai_ao_cuoi, ao_cuoi.ten, gia from ao_cuoi inner join loai_ao_cuoi on ao_cuoi.ma_loai_ao_cuoi = loai_ao_cuoi.ma where ao_cuoi.ma = " . $ma);
                            $ao_cuoi = $ao_cuois->fetch_assoc();
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td>Hệ thống cửa hàng áo cưới Trúc Giang</td>
                                <td><?=$ao_cuoi['ten']?></td>
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
                            $dich_vu_goi_chup_anhs = $_SESSION['dich_vu']['goi_chup_anh'];
                            $i = 1;
                            $tong = 0;
                            foreach ($dich_vu_goi_chup_anhs as $ma) {
                                $goi_chup_anhs = mysqli_query($conn, "select chup_anh.ten as ten_chup_anh, goi_chup_anh.ten as ten, gia from goi_chup_anh inner join chup_anh on goi_chup_anh.ma_chup_anh = chup_anh.ma where goi_chup_anh.ma = " . $ma);
                                $goi_chup_anh = $goi_chup_anhs->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$goi_chup_anh['ten_chup_anh']?></td>
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
             <!--Huy-dat hoa don-->
            <div class="row mb-4 justify-content-center text-center">
                <div class="col-3">
                    <form class="d-inline" action="hoa-don-nhap-thong-tin.php" method="post">
                        <button class="btn btn-hoadon" type="submit">Đặt</button>
                    </form>
                    <form class="d-inline" action="actions/action-huy-hoa-don.php" method="post">
                        <button class="btn btn-hoadon" type="submit">Hủy</button>
                    </form>
                </div>    
            </div> 
       </div>
    </div>
        
<?php
include 'include/footer.php';
?>