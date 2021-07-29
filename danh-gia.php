<?php
include 'include/header.php';
?>
    <style>
        .hoadon{
            background: url("hinh/nenhong.png") top center no-repeat;
        }
        .text-bold{
            font-weight: bold;
        }
        .textarea{
            width: 220px;
            height: 100px;
        }
        .btn-chon{
            background-color: #3399FF;
            border-radius: 10px;
            padding: 1px 8px;
            margin-top: 10px;
            font-size: 16px;
            color: #000;
            font-weight: bold;
        }
    </style>

    <div class="row hoadon">
        <div class="col">
            <form action="actions/action-danh-gia.php" method="post">
                <div class="row">
                    <h4 class="text-danger text-center mt-4">PHẢN HỒI ĐÁNH GIÁ CỦA KHÁCH HÀNG</h4>
                </div>
                <div class="row">
                    <h5 class="text-danger text-center mt-4">Mức độ hài lòng của khách hàng</h5>
                </div>
                <!--Muc do hai long-->
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio1" name="xep_hang" value="1">
                                <label class="form-check-label text-bold" for="radio1">Rất hài lòng</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio2" name="xep_hang" value="2">
                                <label class="form-check-label text-bold" for="radio2">Hài lòng</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio3" name="xep_hang" value="3">
                                <label class="form-check-label text-bold" for="radio3">Không hài lòng</label>
                            </div>
                            <div class="form-check form-check-inline">    
                                <input class="form-check-input" type="radio" id="radio4" name="xep_hang" value="4">
                                <label class="form-check-label text-bold" for="radio4">Chất lượng quá tệ</label>
                            </div>
                        </div>
                    </div> 
                </div>
                <!--Viet phan hoi-->
                <div class="row">
                    <h5 class="text-bold text-center mt-4">Viết phản hồi:</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xm-3 col-sm-3">
                        <textarea class="textarea" name="noi_dung" placeholder="Nhập"></textarea>
                    </div>
                </div>
                <!--ten-->
                <div class="row justify-content-center mt-3 mb-4">
                    <div class="col-4">
                        Tên: <input name="ten" type="text"/>
                        <button class=" btn btn-chon">Gửi</button>  
                    </div>
                </div>
            </form>
            <!--danh sach binh luan-->
            <div class="row justify-content-center mb-4">
                <div class="col-xm-4 col-sm-4">
                    <?php
                    $danh_gias=$conn->query("select * from danh_gia where ma_danh_gia is null");
                    $i=1;
                    while($danh_gia=$danh_gias->fetch_assoc()) {
                    ?>
                        <table class="table table-light">
                            <thead>
                                <tr >
                                    <td><?=$i ?>.</td>
                                    <th class="text-danger"><?=$danh_gia['ten']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <th class="text-primary">
                                    <?php
                                    switch($danh_gia['xep_hang']) {
									case 1:
										echo 'Rất hài lòng';
										break;
									case 2:
										echo 'Hài Lòng';
										break;
									case 3:
										echo 'Không hài lòng';
										break;
									case 4:
										echo 'Chất lượng quá tệ';
										break;
                                    }
								    ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><?=$danh_gia['noi_dung']?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-bold text-primary">Trả lời bình luận</td>
                                </tr>
                                <?php
                                $binh_luans = $conn->query("select * from danh_gia where ma_danh_gia = " . $danh_gia['ma']);
                                while($binh_luan = $binh_luans->fetch_assoc()) { ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $binh_luan['noi_dung'] ?></td>
                                    </tr>
							<?php } ?>

                            <?php
                            if (isAdmin()) {
                            ?>
                               <tr>
                                   <td></td>
                                   <td style="color:#000; padding-top:20px">Bình luận
                                       <form action="actions/action-gui-binh-luan.php" method="post">
                                           <input name="noi_dung" />
                                           <input type="hidden" name="ma_danh_gia" value="<?=$danh_gia['ma']?>" />
                                           <input type="submit" class="btn btn-chon" value="Gửi" />					
                                       </form>
                                   </td>
                               </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php
                    $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
include 'include/footer.php';
?>