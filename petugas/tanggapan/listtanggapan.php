<?php 
$tanggapan = query("SELECT * FROM tanggapan");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tanggapan </title>
</head>
<body>

	<h1> Daftar Tanggapan</h1>

<a href="?page=tanggapan&fitur=list" class="btn btn-primary btn-sm">[+] Tambah Data Tanggapan</a>
<br><br>


	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center> ID Tanggapan </center></th>
			<th><center> ID Pengaduan </center></th>
			<th><center> Tanggal Tanggapan </center></th>
			<th><center> Tanggapan  </center></th>
			<th><center> ID Petugas </center></th>
			<th><center> Aksi </center></th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $tanggapan as $row) : ?>
			<tr>
				<td><?= $i; ?> </td>
				
				<td><?= $row["id_pengaduan"];?></td>
				<td><?= $row["tgl_tanggapan"];?></td>
				<td><?= $row["tanggapan"];?></td>
				<td><?= $row["id_petugas"];?></td>

				<td>
					<a href="?page=tanggapan&fitur=ubah&id_tanggapan=<?= $row["id_tanggapan"]; ?>" class="btn btn-warning">Ubah</a> |
					<a href="?page=tanggapan&fitur=hapus&id_tanggapan=<?= $row["id_tanggapan"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>