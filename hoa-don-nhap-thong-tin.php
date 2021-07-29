<?php
include 'include/header.php';
?> 
<style>
    .btn-hoadon{
        text-align: center;
        background: #F778A1;
        color: #FFF;
        font-weight: bold;
        padding: 5px 13px;
        border-radius: 13px;
    }
</style>
<form action="actions/action-dat-hoa-don.php" method="post">
    <div class="row justify-content-center">
        <h5 class="text-center mt-4">Vui lòng điền những thông tin sau:</h5>
        <div class="col-xm-3 col-sm-4">
            <table class="table">
                   <tr>
                       <th>Họ tên: </th>
                       <td><input name="ten" /></td>
                   </tr> 
                   <tr>
                       <th>SĐT: </th>
                       <td><input name="sdt" /></td>
                   </tr> 
                   <tr>
                       <th>Email: </th>
                       <td><input name="email" type="email" /></td>
                   </tr> 
                   <tr>
                       <td colspan="2" class="text-center">
                           <button class="btn btn-hoadon" >Gửi</button>
                        </td>
                   </tr> 			
            </table>
        </div>
        
    </div>
</form>

<?php
include 'include/footer.php';
?>