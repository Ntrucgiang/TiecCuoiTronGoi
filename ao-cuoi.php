<?php
include 'include/header.php';
?>
    <style>
        .anh{
            background: url("./hinh/ao_cuoi/cua_hang2.png") top center no-repeat;
            height: 350px;
        }
        .anh-fade{
            background: rgb(29, 11, 11);
            opacity: 0.73;
        }
        .menu{
            background: rgb(243, 226, 241);
        }
        .nen{
            background-color: #FDEEF4;
        }
        .btn-chon{
            background-color: rgb(223, 124, 141);
            border-radius: 10px;
            padding: 1px 8px;
            font-size: 14px;
            color: #000;
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
                    <h2 class="text-white text-center">HỆ THỐNG CỬA HÀNG ÁO CƯỚI TG</h2>
                    <h4 class="text-white text-center">Luôn cung cấp nhưng mẫu áo cưới đẹp nhất</h4>
                </div>
            </div>
        </div>
        <!--Ao dai-->
        <?php
        $loai_ao_cuois = $conn->query("select * FROM loai_ao_cuoi");
        $i = 1;
        while($loai_ao_cuoi = $loai_ao_cuois->fetch_assoc()) {
        ?>
            <div class="row ct_l2_ao text-center mt-4">
                <ul>
                    <li><?=$loai_ao_cuoi['ten']?></li>
                    <li><?=$loai_ao_cuoi['slogan']?></li>
                    <li><?=drawAdminButton('quan-ly-ao-cuoi.php?ma_loai_ao_cuoi=' . $loai_ao_cuoi['ma'], 'Thêm áo cưới', 'add', 32, 'admin-button', 'admin-text')?></li>
                </ul> 
            </div>
            <div class="row nen">
                <?php
                $ao_cuois = $conn->query("select * from ao_cuoi where ma_loai_ao_cuoi = " . $loai_ao_cuoi['ma']);
                while($ao_cuoi = $ao_cuois->fetch_assoc()) {
                ?>
                    <div class="col-md-3 col-sm-12 text-center">
                        <img class="mt-4" src="hinh/ao_cuoi/aocuoi<?=$ao_cuoi['ma']?>.png" width="230px" height="310px">
                        <h6  class="mt-3"><?=$ao_cuoi['ten']?></h6>
                        <h6 class="d-inline text-danger">Giá: </h6>
                        <p class="d-inline text-primary"><?=number_format($ao_cuoi['gia'])?>đ</p>
                        <?php
                        if ($ao_cuoi['mo_kinh_doanh'] == 1 || isAdmin()) {
                        ?>
                            <div class="text-center"><?=$ao_cuoi['mo_kinh_doanh'] == 0 ? 'Không kinh doanh' : ''?></div>
                            <form action ="actions/action-dat-ao-cuoi.php" method="POST">
                                <div>
                                    <?php
                                    if (isAdmin()) {
                                    ?>
                                        <?=drawAdminIcon('quan-ly-ao-cuoi.php?ma='. $ao_cuoi['ma'] . '&ma_loai_ao_cuoi=' . $ao_cuoi['ma_loai_ao_cuoi'], 'edit', 32, 'admin-icon')?>
                                        <?=drawAdminIcon('quan-ly-ao-cuoi.php?ma='. $ao_cuoi['ma'] . '&xoa', 'delete', 32, 'admin-icon')?>
                                    <?php
                                    } else {
                                    ?>
                                        <input type='hidden' name='ma' value='<?=$ao_cuoi['ma'] ?>'></input>
                                        <button class="btn btn-chon mb-4 mt-2">Thuê</button>
                                    <?php
                                    }
                                    ?> 
                                </div>
                            </form>
                        <?php
                        } else {
                        ?>
                            <p>Ngừng kinh doanh</p>
                        <?php
                        }
                        ?>
                    </div>
            <?php
                }
            $i++;
        }
        ?>
    </div>
<?php
include 'include/footer.php';
?>