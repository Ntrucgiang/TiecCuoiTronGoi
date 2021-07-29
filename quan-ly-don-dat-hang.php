<?php
include 'include/header.php';
if (!isset($_SESSION['tai_khoan'])) {
    header("location: dang-nhap.php");
} else {
?>
    <div class="row justify-content-center mt-4">
        <h4 class="text-center text-danger">DANH DÁCH ĐƠN ĐẶT HÀNG</h4>
        <div class="col-xs-6 col-sm-10">
            <table class="table table-bordered border-dark">
                <thread>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>SDT</th>
                        <th>Email</th>
                        <th>Ngày đặt</th>
                        <th>Chi tiết</th>
                    </tr>
                </thread>
                <?php
                    $sql ="select * FROM hoa_don";
                    $result=mysqli_query($conn,$sql);
                    while($item = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $item['ten']?></td>
                        <td><?= $item['sdt']?></td>
                        <td><?= $item['email']?></td>
                        <td><?= $item['ngay_dat']?></td>
                        <td><a href="quan-ly-don-dat-hang-chi-tiet.php?ma=<?= $item['ma']?>">Xem thông tin</a></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
<?php } ?>
<?php
include 'include/footer.php';
?>