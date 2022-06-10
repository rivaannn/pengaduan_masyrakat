<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Registrasi</title>
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
                        Registrasi
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter nik">
                        <input class="input100" type="text" name="nik" placeholder="NIK">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter nama">
                        <input class="input100" type="text" name="nama" placeholder="Nama">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div><br>
                     <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
                        <span class="focus-input100"></span>
                    </div><br>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter telp">
                        <input class="input100" type="text" name="telp" placeholder="Telefon">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input class="input100" type="text" name="alamat" placeholder="Alamat">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="register" name="register" class="login100-form-btn">
                            Registrasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php
    include("../config/koneksi.php");
    // jika tombol daftar ditekan
    if(isset($_POST['register'])) {
        $nik = htmlspecialchars($_POST['nik']);
        $nama = htmlspecialchars($_POST['nama']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);
        $telp = htmlspecialchars($_POST['telp']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $level = "user";

        // cek username sudah ada apa belum
        $sql = "SELECT username FROM masyarakat WHERE username = '$username'";
        $query = mysqli_query($koneksi, $sql);

        // jika username sudah terdaftar tampilkan pesan
        if (mysqli_fetch_assoc($query)){
            echo "<script>alert('Username sudah terdaftar!');</script>";
            return false;
        }

        // cek konfirmasi password
        if($password != $password2){
            echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
            return false;
        }

        // buat query
        $sql = "INSERT INTO masyarakat VALUES ('$nik', '$nama', '$username', '$password', '$telp', '$alamat', '$level')";
        $query = mysqli_query($koneksi, $sql);

        // jika berhasil 
        if($query) {
            echo "<script>alert('Pendaftaran berhasil');</script>";
            echo "<script>location='../login/loginmasyarakat.php';</script>";
        } else {
            // jika gagal
            echo "<script>alert('Pendaftaran gagal');</script>";
            echo "<script>location='registermasyarakat.php';</script>";
        }
    } else {
        return mysqli_affected_rows($koneksi);
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