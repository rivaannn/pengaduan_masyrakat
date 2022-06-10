<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="POST" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						Login Admin
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div><br>
					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php
    session_start();
    include("../config/koneksi.php");

    // jika tombol login di tekan
    if(isset($_POST['login'])){

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM petugas WHERE username = '$user' AND password = '$pass'";
        $query = mysqli_query($koneksi, $sql);

        $data_login = mysqli_fetch_array($query);
        $jumlahdata = mysqli_num_rows($query);

        if($jumlahdata >= 1){
            if($data_login['level']=='admin'){
                ?>
                <script type="text/javascript">
                    alert('Masuk sebagai Administrator');
                    setTimeout("location.href='../indexadmin.php?page=beranda&fitur=aktif'");
                </script>
                <?php
                $_SESSION['username']=$data_login['username'];
                $_SESSION['password']=$data_login['password'];
            } elseif ($data_login['level']=="petugas") {
                ?>
                <script type="text/javascript">
                    alert('masuk sebagai Petugas');
                    setTimeout("location.href='../indexpetugas.php?page=beranda&fitur=aktif'");
                </script>
                <?php
                $_SESSION['username']=$data_login['username'];
                $_SESSION['password']=$data_login['password'];
            } elseif ($data_login['level']=="user") {
                ?>
                <script type="text/javascript">
                    alert('masuk sebagai Masyarakat');
                    setTimeout("location.href='../indexmasyarakat.php?page=beranda&fitur=aktif'");
                </script>
                <?php
                $_SESSION['username']=$data_login['username'];
                $_SESSION['password']=$data_login['password'];
            } 
        } else {
            ?>
            <script type="text/javascript">
                alert('gagal masuk');
                setTimeout("location.href='loginadmin.php'");
            </script>
            <?php
        }
    }
    ?>
	
	
	<!--===============================================================================================-->
	<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../assets/js/main.js"></script>

</body>
</html>