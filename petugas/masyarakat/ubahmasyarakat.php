<?php
// ambil data di URL
$nik = $_GET["nik"];
// query data masyarakat berdasarkan nik
$mys =  query("SELECT * FROM masyarakat WHERE nik ='$nik'");


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubahmasyarakat($_POST) > 0) {
		echo "<script>
		alert('Data berhasil Diubah')
		document.location.href = '?page=masyarakat&fitur=list'
		</script>
		";	
	} else {
		echo "<script>
		alert('Data Gagal Diubah')
		document.location.href = '?page=masyarakat&fitur=list'
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Masyarakat</title>
</head>
<body>

	<h1>Ubah Data Masyarakat</h1>

	<form action="" method="post">
		<?php foreach ($mys as $row ) : ?>
			<fieldset>
				<div class="form-group has-success">
					<label class="control-label" for="NIK">NIK :</label>
					<input type="text" class="form-control" name="nik" id="NIK" required value="<?= $row["nik"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Nama">Nama :</label>
					<input type="text" class="form-control" name="nama" id="Nama" required value="<?= $row["nama"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Username">Username :</label>
					<input type="text" class="form-control" name="username" id="Username" required value="<?= $row["username"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Password">Password :</label>
					<input type="password" class="form-control "name="password" id="Password" required value="<?= $row["password"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Konfirmasi Password">Konfirmasi Password :</label>
					<input type="password" class="form-control "name="password2" id="Konfirmasi Password" required value="<?= $row["password"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Telefon">Telefon :</label>
					<input type="text" class="form-control" name="telp" id="Telefon" required value="<?= $row["telp"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Alamat">Alamat :</label>
					<input type="text" class="form-control" name="alamat" id="Alamat" required value="<?= $row["alamat"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<input type="submit" class="btn btn-primary" value="Ubah Data!" name="submit"/>
				</div>

			</fieldset>
			
		<?php endforeach; ?>
	</form>

</body>
</html>