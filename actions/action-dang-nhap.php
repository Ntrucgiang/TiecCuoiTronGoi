<?php
include '../config.php';
if (isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql ="select * FROM tai_khoan WHERE username='$username' and password = '$password'";
    $result=mysqli_query($conn,$sql);
    if($item = $result->fetch_assoc()) {
        $_SESSION['tai_khoan'] = [
            'username' => $item['username'],
            'password' => $item['password'],
            'ten' => $item['ten'],
            'email' => $item['email'],
            'sdt' => $item['sdt'],
        ];
        header("location:../index.php");
    }
    else{
        header("location:../dang-nhap.php?loi=1");
    }
}
$conn-> close();
?>