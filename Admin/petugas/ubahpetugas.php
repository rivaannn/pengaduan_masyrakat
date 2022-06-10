<?php
// ambil data di URL
$id_petugas = $_GET["id_petugas"];
// query data petugas berdasarkan id_petugas
$ptg =  query("SELECT * FROM petugas WHERE id_petugas='$id_petugas'");


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubahpetugas($_POST) > 0) {
		echo "<script>
		alert('Data berhasil Diubah')
		document.location.href = '?page=petugas&fitur=list'
		</script>
		";	
	} else {
		echo "<script>
		alert('Data Gagal Diubah')
		document.location.href = '?page=petugas&fitur=list'
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Petugas</title>
</head>
<body>

	<h1>Ubah Data Petugas</h1>

	<form action="" method="post">
		<?php foreach ($ptg as $row ) : ?>
			<input type="hidden" name="id_petugas" value="<?= $row["id_petugas"]; ?>">
			<fieldset>
				<div class="form-group has-success">
					<label class="control-label" for="Nama Petugas">Nama Petugas :</label>
					<input type="text" class="form-control" name="nama_petugas" id="Nama Petugas" required value="<?= $row["nama_petugas"]; ?>"></input>
				</div class="form-group has-success">
				<div class="form-group has-success">
					<label class="control-label" for="Username">Username :</label>
					<input type="text" class="form-control" name="username" id="Username" required value="<?= $row["username"]; ?>"></input>
				</div class="form-group has-success">
				<div class="form-group has-success">
					<label class="control-label" for="Password">Password :</label>
					<input type="password" class="form-control" name="password" id="Password" required value="<?= $row["password"]; ?>"></input>
				</div class="form-group has-success">
				<div class="form-group has-success">
					<label class="control-label" for="Konfirmasi Password">Konfirmasi Password :</label>
					<input type="password" class="form-control" name="password2" id="Konfirmasi Password" required value="<?= $row["password"]; ?>"></input>
				</div class="form-group has-success">
				<div class="form-group has-success">
					<label class="control-label" for="Telefon">Telefon :</label>
					<input type="text" class="form-control" name="telp" id="Telefon" required value="<?= $row["telp"]; ?>"></input>
				</div> 
				<div class="form-group has-success">
					<input type="submit" class="btn btn-primary" value="Ubah Data!" name="submit"/>
				</div>
			</fieldset>

		<?php endforeach; ?>
	</form>

</body>
</html>