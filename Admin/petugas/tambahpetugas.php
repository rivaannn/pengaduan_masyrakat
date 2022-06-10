<?php
// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	$password = $_POST["password"];
	$password2 = $_POST["password2"];
	if( $password != $password2 ) {
		echo "<script>
		alert('Password Dan Konfirmasi Password Tidak Sama')
		document.location.href = '?page=petugas&fitur=pesan'
		</script>
		";
	} else {

	// cek apakah data berhasil ditambahkan atau tidak
		if( tambahpetugas($_POST) > 0) {
			echo "<script>
			alert('Data berhasil Ditambahkan')
			document.location.href = '?page=petugas&fitur=list'
			</script>
			";	
		} else {
			echo "<script>
			alert('Data Gagal Ditambahkan')
			document.location.href = '?page=petugas&fitur=pesan'
			</script>
			";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Petugas</title>

	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/css/local.css" />

	<script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<h1>Tambah Data Petugas</h1>

	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-6">

				<form action="" method="post">
					<fieldset>
						<div class="form-group has-success">
							<label class="control-label" for="Nama Petugas">Nama Petugas :</label>
							<input type="text" class="form-control" name="nama_petugas" id="Nama Petugas" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Username">Username :</label>
							<input type="text" class="form-control" name="username" id="Username" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Password">Password :</label>
							<input type="password" class="form-control" name="password" id="Password" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Konfirmasi Password">Konfirmasi Password :</label>
							<input type="password" class="form-control" name="password2" id="Konfirmasi Password" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Telefon">Telefon :</label>
							<input type="text" class="form-control" name="telp" id="Telefon" required></input>
						</div>
						<div class="form-group has-success">
							<input type="submit" class="btn btn-primary" value="Tambah Data!" name="submit"/>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>