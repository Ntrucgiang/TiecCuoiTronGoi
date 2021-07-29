<?php
include 'include/header.php';
?>
      <style>
            .anh{
                background: url("./hinh/nhiep_anh/chupanh.png") top center no-repeat;
                height: 410px;
            }
            .anh-fade{
                background: rgb(29, 11, 11);
                opacity: 0.6;
            }
            .nen{
                background-color: #FDEEF4;
            }
            .btn-chon{
                background-color: rgb(223, 124, 141);
                border-radius: 10px;
                padding: 1px 8px;
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
            .text-sp{
                font-size: 17px;
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
                <div class="row">
                    <div class="col-xs-6 col-sm-12 mt-4 align-items-center">
                        <div class="d-flex justify-content-end mt-5 mr-3">
                            <h3 class="text-center">ĐẶT TRƯỚC ONLINE, CHỌN NGÀY THOẢI MÁI.</h3>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        <!--Dich vu chup anh cuoi-->
         <div class="row ct_l2_ao text-center mt-4">
            <ul>
                <li >DỊCH VỤ CHỤP ẢNH CƯỚI BẢO TRÚC</li>
                <li > Luôn lưu lại những khoảnh khắc đẹp nhất</li>
                <li><?=drawAdminButton('quan-ly-goi-chup-anh.php?ma_chup_anh=1', 'Thêm gói chụp ảnh', 'add', 32, 'admin-button', 'admin-text')?></li>
            </ul> 
        </div>
            <div class="row nen align-items-center">
            <?php
            $goi_chup_anhs = $conn->query("select * FROM goi_chup_anh");
            $i = 0;
            while($goi_chup = $goi_chup_anhs->fetch_assoc()) {
            ?>
                    <div class="col-xs-12 col-sm-6">
                        <img class="mt-4" src="hinh/nhiep_anh/chup<?=$goi_chup['ma']?>.png" width="460px" height="350px">
                    </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="text-center">
                                <?php
                                if (isAdmin()) {
                                    ?>
                                    <?=drawAdminIcon('quan-ly-goi-chup-anh.php?ma_chup_anh=1&ma='. $goi_chup['ma'], 'edit', 32, 'admin-icon ')?>
                                    <?=drawAdminIcon('quan-ly-goi-chup-anh.php?ma='. $goi_chup['ma']. '&xoa', 'delete', 32, 'admin-icon')?>
                                    <?php
                                }
                                ?>
                            </div>
                            <h3 class="text-center"><?=$goi_chup['ten']?></h3>
                            <?php
                            if ($goi_chup['mo_kinh_doanh'] == 1 || isAdmin()) {
                            ?>
                                <div class="text-center"><?=$goi_chup['mo_kinh_doanh'] == 0 ? 'Không kinh doanh' : ''?></div>
                                <form class="text-center" action="actions/action-dat-goi-chup-anh.php" method="POST">
                                    <h6 class="d-inline text-danger">Giá tiền: </h6>
                                    <p class="d-inline text-primary"><?=number_format($goi_chup['gia'])?>đ</p>
                                    <?php
                                    if (!isAdmin()) {
                                    ?>
                                        <input type='hidden' name='ma' value='<?=$goi_chup['ma'] ?>'></input>
                                        <button class="btn btn-chon" type="submit">Chọn</button>
                                    <?php
                                    }
                                    ?>
                                </form>
                            <?php
                            } else {
                            ?>
                                <p class="text-center">Ngừng kinh doanh</p>
                            <?php
                            }
                            ?>
                            <h5 class="text-center">Bao gồm:</h5>
                            <div class="d-flex justify-content-center">
                                <div class="mb-2">
                                    <?php
                                    $cong_cus = explode("\r\n", $goi_chup['cong_cu']);
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
                                    $san_phams = explode("\r\n", $goi_chup['san_pham']);
                                    foreach ($san_phams as $san_pham) {
                                    ?>
                                        <div class="text-sp"><?=$san_pham ?></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    $i++;
                }
                ?>
            </div> 
        
<?php
include 'include/footer.php';
?>