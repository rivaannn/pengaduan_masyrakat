<?php


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	
	// cek apakah data berhasil ditambahkan atau tidak
	if( tambahtanggapan($_POST) > 0) {
		echo "<script>
		alert('Data berhasil Ditambahkan')
		document.location.href = '?page=tanggapan&fitur=list'
		</script>
		";	
	} else {
		echo "<script>
		alert('Data Gagal Ditambahkan')
		document.location.href = '?page=tanggapan&fitur=pesan'
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Tanggapan</title>

	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/css/local.css" />

	<script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<h1>Tambah Data Mahasiswa</h1>
	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-6">

				<form action="" method="post">
					<fieldset>
						<div class="form-group has-success">
							<label class="control-label" for="ID Pengaduan">ID Pengaduan :</label>
							<input type="text" class="form-control" name="id_pengaduan" id="ID Pengaduan" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Tanggal Tanggapan">Tanggal Tanggapan :</label>
							<input type="date" class="form-control" name="tgl_tanggapan" id="Tanggal Tanggapan" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Tanggapan">Tanggapan :</label>
							<input type="text" class="form-control" name="tanggapan" id="Tanggapan" required></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="ID Petugas">ID Petugas :</label>
							<input type="text" class="form-control" name="id_petugas" id="ID Petugas" required></input>
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