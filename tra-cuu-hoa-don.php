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
        color:#CA226B;
    }

    
</style>
<div class="row hoadon">
    <div class="col-12">
        <div class="row ">
            <h3 class="text-center text-danger mt-4">TRA CỨU HÓA ĐƠN</h3>
        </div>
        <!--Form tra cứu-->
        <form action="tra-cuu-hoa-don-ket-qua.php" method="post">
            <div class="row justify-content-center mt-4">
                <div class="col-xs-4 col-sm-5">
                    <table class="table ">
                        <tr>
                            <th>Nhập mã hóa đơn:</th>
                            <td><input class="d-inline mb-3" name="ma_hoa_don"/></td>
                        </tr>
                        <tr>
                            <th>Nhập mã bảo mật: </th>
                            <td><input class="d-inline" name="ma_bao_mat"/></td>
                        </tr>
                        <tr>

                            <th colspan="2" class="text-center"><button class="btn btn-hoadon mt-2 mb-4">Tra cứu</button></th>
                        </tr>
                    </table>
                </div>
            </div>    
        </form>
    </div>
</div>
<?php
include 'include/footer.php';
?>