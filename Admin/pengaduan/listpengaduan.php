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
<br>

<a href="?page=pengaduan&fitur=pesan" class="btn btn-primary btn-sm">[+] Tambah Data Pengaduan</a>
<br><br>

	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center>ID Pengaduan</center></th>
			<th><center>Tanggal Pengaduan</center></th>
			<th>NIK</th>
			<th><center>Isi Laporan</center></th>
			<th><center>Foto</center></th>
			<th><center>Status</center></th>
			<th><center>Aksi</center></th>
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

				<td>
					<a href="?page=pengaduan&fitur=ubah&id_pengaduan=<?=$row["id_pengaduan"];?>" class="btn btn-warning">Ubah</a> |
					<a href="?page=pengaduan&fitur=hapus&id_pengaduan=<?=$row["id_pengaduan"];?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>