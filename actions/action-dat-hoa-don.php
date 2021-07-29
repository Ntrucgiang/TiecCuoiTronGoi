<?php
include '../config.php';
if (isset($_POST['ten']) && isset($_POST['sdt']) && isset($_POST['email'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $ngay_dat = date('Y-m-d h:i:s', time());
    $ma_bao_mat = random_int(111111, 999999);
    
    //Tạo hóa đơn mới
    mysqli_query($conn, "insert into hoa_don(ten, sdt, email, ngay_dat, ma_bao_mat) values ('$ten', $sdt, '$email', '$ngay_dat', '$ma_bao_mat')");
    $ma_hoa_don = mysqli_insert_id($conn);
    //Điền nhà hàng
    $nha_hang = $_SESSION['dich_vu']['goi_nha_hang'];
    foreach ($nha_hang as $ma) {
        mysqli_query($conn, "insert into hoa_don_goi_nha_hang(ma_hoa_don, ma_goi_nha_hang) values ($ma_hoa_don, $ma)");
        mysqli_insert_id($conn);
    }
    //Điền áo cưới
    $ao_cuoi = $_SESSION['dich_vu']['ao_cuoi'];
    foreach ($ao_cuoi as $ma) {
        mysqli_query($conn, "insert into hoa_don_ao_cuoi(ma_hoa_don, ma_ao_cuoi) values ($ma_hoa_don, $ma)");
        mysqli_insert_id($conn);
    }
    
    //Điền chụp ảnh
    $chup_anh = $_SESSION['dich_vu']['goi_chup_anh'];
    foreach ($chup_anh as $ma) {
        mysqli_query($conn, "insert into hoa_don_goi_chup_anh(ma_hoa_don, ma_goi_chup_anh) values ($ma_hoa_don, $ma)");
        mysqli_insert_id($conn);
    }
    
    $_SESSION['dich_vu'] = [
        'goi_nha_hang' => [],
        'ao_cuoi' => [],
        'goi_chup_anh' => [],
    ];
    
    //gui email 
    $nguoi_nhan = $email;
    $tieu_de= "Bạn đã đặt thành công dịch vụ của Hệ Thống Tiệc Cưới Trọn Gói Trúc Giang.";
    $noi_dung="Cảm ơn bạn đã tin tưởng dịch vụ của hệ thống.\nĐây là mã hóa đơn của bạn: MHD" . $ma_hoa_don . "\nMã bảo mật: " . $ma_bao_mat;
    $nguoi_gui="From:Tieccuoitrongoik12@gmail.com \r\n";
    $gui = mail($nguoi_nhan, $tieu_de, $noi_dung,$nguoi_gui);
    if($gui==true)
    {
        echo "Đã gửi mail thành công";
    }
    else{
        echo "Không gửi được mail.";
    }
    header('Location: ../hoa-don.php?da_dat=' . $email);
}
header('Location: ../hoa-don.php');
?>