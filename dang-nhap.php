<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    
<head>
	<title>Dịch vụ tiệc cưới trọn gói TG</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css_G/css_login.css">
	
</head>

<?php
	include 'config.php';
	if (isset($_SESSION['tai_khoan'])) {
		header("location: index.php");
	} else {
?>
<body>
    <style>
        	/* Coded with love by Mutiullah Samim */
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        background: #e6dae6 !important;
    }

    .user_card {
        height: 450px;
        width: 350px;
        margin-top: 30px;
        margin-bottom: 30px;
        background: #ec9aca;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;

    }
    .brand_logo_container {
        position: absolute;
        height: 180px;
        width: 180px;
        top: -75px;
        border-radius: 50%;
        background: #e5c8e6;
        padding: 10px;
        text-align: center;
    }
    .brand_logo {
        height: 160px;
        width: 160px;
        border-radius: 50%;
        border: 2px solid white;
    }
    .form_container {
        margin-top: 100px;
    }
    .login_btn {
        width: 100%;
        background: #962a60 !important;
        color: white !important;
    }
    .login_btn:hover {
        width: 100%;
        background: #c287a4 !important;
        color: white !important;
    }
    .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .login_container {
        padding: 0 2rem;
    }
    .input-group-text {
        background: #e476bf !important;
        color: white !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: #85677d !important;
    }
    .ml-2 {
        color: rgb(44, 63, 170);
    }
    </style>
<div action ="login_button.php" method="POST">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="hinh/logo.png" width="180" height="280" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action ="actions/action-dang-nhap.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="Tên đăng nhập">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Mật khẩu">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input name="nho_mat_khau" type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Nhớ tài khoản</label>
							</div>
						</div>
						<div><?= isset($_GET['loi']) ? 'Sai tên tài khoản hoặc mật khẩu' : '' ?></div>
						<div class="d-flex justify-content-center mt-3 login_container">
				 			<button type="submit" class="btn login_btn">Đăng nhập</button>
						</div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Không có tài khoản? <a href="#" class="ml-2">Đăng Ký</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#" class="ml-2">Quên mật khẩu?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php } ?>
</html>
