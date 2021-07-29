<?php
include 'include/header.php';
?>
<style>
    .anh{
        background: url("hinh/nha_hang/nha_hang_banner.png")  top center no-repeat;
        height: 350px;
    }
    .anh-fade{
        background: rgb(29, 11, 11);
        opacity: 0.7;
    }
    .nen{
        background-color: #FDEEF4;
    }
    .btn-chon{
        background-color: rgb(223, 124, 141);
        border-radius: 10px;
        padding: 1px 8px;
        margin-top: 10px;
        font-size: 16px;
        color: cornsilk;
    }
    .ct_l2_ao{
        line-height: 40px;
        width: 100%;
        margin-top: 40px;
        color: #000;
        font-size: 20px;


    }
    .ct_l2_ao li:first-child{
        font-weight: bold;
        color: rgb(49, 7, 44);
        font-size: 24px;
    }
    ul li{
        list-style-type: none;
    }
    .admin-button {
        background: #0033FF;
    }
    .admin-text {
        color:#fff;
    }
    .admin-icon {
        color:#0000CC;
    }
</style>
<!--Anh-->
<div class="row anh">
    <div class="col-12 h-100 anh-fade">
        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
            <h2 class="text-white text-center">HỆ THỐNG NHÀ HÀNG TIỆC CƯỚI TG</h2>
            <h4 class="text-white text-center"> Luôn phục vụ với chất lượng tốt nhất</h4>
        </div>
    </div>
</div>
<!--Tieu de-->
<div class="row ct_l2_ao text-center mt-4">
    <ul>
        <li >NHÀ HÀNG TIỆC CƯỚI TG</li>
        <li > Đầy đủ gói tiệc cưới.</li>
        <li><?=drawAdminButton('quan-ly-nha-hang.php', 'Thêm nhà hàng', 'add', 32, 'admin-button', 'admin-text')?></li>
    </ul> 
</div>
<!-- Danh sach nha hang -->
<?php
$nha_hangs = $conn->query("select ma, slogan, ten, dia_chi, sdt, mo_kinh_doanh from nha_hang");
$i=0;
while ($nha_hang = $nha_hangs->fetch_assoc()) {
?>
<div class="row nen align-items-center mt-4">
    <div class="col-xs-12 col-sm-6">
        <img class="mt-4 mb-4" src="hinh/nha_hang/nhahang<?=$nha_hang['ma']?>.png" width="100%">
    </div>
    <div class="col-xs-12 col-sm-6 text-center">
        <h3>
            <?=$nha_hang['ten']?>
            <?=drawAdminIcon('quan-ly-nha-hang.php?ma=' . $nha_hang['ma'], 'edit', 32, 'admin-icon')?>
            <?=drawAdminIcon('quan-ly-nha-hang.php?ma=' . $nha_hang['ma'] . '&xoa', 'delete', 32, 'admin-icon')?>
        </h3>
        <h5><?=$nha_hang['slogan']?></h5>
        <?php
        if ($nha_hang['mo_kinh_doanh'] == 1 || isAdmin()) {
            $goi_nha_hangs = $conn->query("select * FROM goi_nha_hang where ma_nha_hang='" . $nha_hang['ma'] . "'");
            while($goi_nha_hang =$goi_nha_hangs->fetch_assoc()){
            ?>
                <div class="text-center"><?=$nha_hang['mo_kinh_doanh'] == 0 ? 'Không kinh doanh' : ''?></div>
                <form action ="actions/action-dat-goi-nha-hang.php" method="POST">
                    <div>
                        <h6 class="d-inline text-danger">Số lượng:</h6>
                        <p class="d-inline text-primary"><?=$goi_nha_hang['so_luong']?></p>
                        <h6 class="d-inline text-danger">Tổng tiền: </h6>
                        <p class="d-inline text-primary"><?=number_format($goi_nha_hang['gia'])?>đ</p>
                        <?php
                        if (isAdmin()) {
                        ?>
                            <?=drawAdminIcon('quan-ly-goi-nha-hang.php?ma=' . $goi_nha_hang['ma'], 'edit', 32, 'admin-icon')?>
                            <?=drawAdminIcon('quan-ly-goi-nha-hang.php?ma=' . $goi_nha_hang['ma'] . '&xoa', 'delete', 32, 'admin-icon')?>
                        <?php
                        } else {
                        ?>
                        
                            <input type='hidden' name='ma' value='<?=$goi_nha_hang['ma'] ?>'></input>
                            <button class="btn btn-chon">Chọn</button>
                            <?php
                        }
                        ?>
                    </div>
                </form>
        <?php
            }
        } else {
        ?>
            <p>Ngừng kinh doanh</p>
        <?php
        }
        ?>
        <?=drawAdminButton('quan-ly-goi-nha-hang.php?ma_nha_hang=' . $nha_hang['ma'], 'Thêm gói mới', 'add', 32, 'admin-button', 'admin-text')?>
        <div>
            <h6 class="d-inline">Địa chỉ: </h6>
            <p class="d-inline text-primary"><?=$nha_hang['dia_chi']?></p>
        </div>
        <div>
            <h6 class="d-inline ">Số điện thoại: </h6>
            <p class=" d-inline text-primary "><?=$nha_hang['sdt']?></p>
        </div>
        
    </div>
</div>
<?php
    $i++;   
}
?>
<?php
include 'include/footer.php';
?>