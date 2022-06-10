<?php 
$pengaduan = query("SELECT * FROM pengaduan");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pengaduan</title>
</head>
<body>

	<h1> Daftar Pengaduan</h1>

<a href="?page=pengaduan&fitur=pesan" class="btn btn-primary btn-sm">Tambah Data Yang Ingin Di Adukan!</a>
<br><br>


	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center>ID Pengaduan</center></th>
			<th><center>Tanggal Pengaduan</center></th>
			<th>NIK</th>
			<th><center>Isi Laporan</center></th>
			<th><center>Foto</center></th>
			<th><center>Status</center></th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $pengaduan as $row) : ?>
			<tr>
				<td><?= $row["id_pengaduan"]; ?> </td>
				
				<td><?= $row["tgl_pengaduan"];?></td>
				<td><?= $row["nik"];?></td>
				<td><?= $row["isi_laporan"];?></td>
				<td><img src="img/<?= $row["foto"]; ?>" width="50"></td>
				<td><?= $row["status"];?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>