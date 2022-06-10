<?php

// ambil data di URL
$id_tanggapan = $_GET["id_tanggapan"];
// query data tanggapan berdasarkan id_tanggapan
$tgp =  query("SELECT * FROM tanggapan WHERE id_tanggapan = $id_tanggapan")[0];


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubahtanggapan($_POST) > 0) {
		echo "<script>
		alert('Data berhasil Diubah')
		document.location.href = '?page=tanggapan&fitur=list'
		</script>
		";	
	} else {
		echo "<script>
		alert('Data Gagal Diubah')
		document.location.href = '?page=tanggapan&fitur=list'
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Tanggapan</title>
</head>
<body>

	<h1>Ubah Data Tanggapan</h1>

	<form action="" method="post">
		<input type="hidden" name="id_tanggapan" value="<?= $tgp["id_tanggapan"]; ?>">
		<fieldset>
			<div class="form-group has-success">
				<label class="control-label" for="ID Pengaduan">ID Pengaduan :</label>
				<input type="text" class="form-control" name="id_pengaduan" id="ID Pengaduan" required value="<?= $tgp["id_pengaduan"]; ?>"></input>
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="Tanggal Tanggapan">Tanggal Tanggapan :</label>
				<input type="date" class="form-control" name="tgl_tanggapan" id="Tanggal Tanggapan" required value="<?= $tgp["tgl_tanggapan"]; ?>"></input>
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="Tanggapan">Tanggapan :</label>
				<input type="text" class="form-control" name="tanggapan" id="Tanggapan" required value="<?= $tgp["tanggapan"]; ?>"></input>
			</div>
			<div class="form-group has-success">
				<label class="control-label" for="ID Petugas">ID Petugas :</label>
				<input type="text" class="form-control" name="id_petugas" id="ID Petugas" required value="<?= $tgp["id_petugas"]; ?>"></input>
			</div>
			<div>
				<button class="btn btn-primary" type="submit" name="submit"> Ubah Data!</button>
			</div>
		</fieldset>
		

	</form>

</body>
</html>