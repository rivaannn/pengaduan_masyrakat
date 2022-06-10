<?php

// ambil data di URL
$id_pengaduan = $_GET["id_pengaduan"];
// query data pengaduan berdasarkan id_pengaduan
$pgd =  query("SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubahpengaduan($_POST) > 0) {
		echo "<script>
		alert('Data berhasil Diubah')
		document.location.href = '?page=pengaduan&fitur=list'
		</script>
		";	
	} else {
		echo "<script>
		alert('Data Gagal Diubah')
		document.location.href = '?page=pengaduan&fitur=list'
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Pengaduan</title>
</head>
<body>

	<h1>Ubah Data Pengaduan</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<?php foreach ($pgd as $row ) : ?>
			<input type="hidden" name="id_pengaduan" value="<?= $row["id_pengaduan"]; ?>">
			<input type="hidden" name="fotoLama" value="<?= $row["foto"]; ?>">
			<fieldset>
				<div class="form-group has-success">
					<label class="control-label" for="Tanggal Pengaduan">Tanggal Pengaduan :</label>
					<input type="date" class="form-control" name="tgl_pengaduan" id="Tanggal Pengaduan" required value="<?= $row["tgl_pengaduan"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="NIK">NIK :</label>
					<input type="text" class="form-control" name="nik" id="NIK" required value="<?= $row["nik"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Isi Laporan">Isi Laporan :</label>
					<input type="text" class="form-control" name="isi_laporan" id="Isi Laporan" required value="<?= $row["isi_laporan"]; ?>"></input>
				</div>
				<div class="form-group has-success">
					<label class="control-label" for="Foto">Foto :</label>
					<img src="img/<?= $row['foto']; ?>" width="40"><br>
					<input type="file" class="form-control" name="foto" id="Foto"></input>
				</div>
				<div class="form-group has-success">
				<input type="submit" class="btn btn-primary" value="Ubah Data!" name="submit"/>
			</div>
			</fieldset>

		<?php endforeach; ?>
	</form>

</body>
</html>