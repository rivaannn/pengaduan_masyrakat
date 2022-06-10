<?php


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"] ) ) {
	$tgl_pengaduan = $_POST["tgl_pengaduan"];
	$nik = $_POST["nik"];
	$isi_laporan = $_POST["isi_laporan"];
	if($tgl_pengaduan == "") {
		echo "<script>
		alert('Harap Diisi Tanggal Pengaduan')
		document.location.href = 'page=pengaduan&fitur=pesan'
		</script>
		";

	}else if($nik == "") {
		echo "<script>
		alert('Harap Diisi Nik')
		document.location.href = 'page=pengaduan&fitur=pesan'
		</script>
		";

	}else if($isi_laporan == "") {
		echo "<script>
		alert('Harap Diisi Laporan')
		document.location.href = 'page=pengaduan&fitur=pesan'
		</script>
		";

	}else{
		// cek apakah data berhasil ditambahkan atau tidak
		if( tambahpengaduan($_POST) > 0) {
			echo "<script>
			alert('Data berhasil Ditambahkan')
			document.location.href = '?page=pengaduan&fitur=list'
			</script>
			";	
		} else {
			echo "<script>
			alert('Data Gagal Ditambahkan')
			document.location.href = 'page=pengaduan&fitur=pesan'
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
	<title>Tambah Data Pengaduan</title>

	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/css/local.css" />

	<script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>
	
</head>
<body>

	<h1>Tambah Data Pengaduan</h1>
	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-6">

				<form action="" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group has-success">
							<label class="control-label" for="Tanggal Pengaduan">Tanggal Pengaduan :</label>
							<input type="date" class="form-control" name="tgl_pengaduan" id="Tanggal Pengaduan"></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="NIK">NIK :</label>
							<input type="text" class="form-control" name="nik" id="NIK"></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Isi Laporan">Isi Laporan :</label>
							<input type="text" class="form-control" name="isi_laporan" id="Isi Laporan"></input>
						</div>
						<div class="form-group has-success">
							<label class="control-label" for="Foto">Foto :</label>
							<input type="file" class="form-control" name="foto" id="Foto" required></input>
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