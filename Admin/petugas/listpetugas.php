<?php
$petugas = query("SELECT * FROM petugas WHERE level = 'petugas'");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas </title>
</head>
<body>

	<h1> Daftar Petugas</h1>

<a href="?page=petugas&fitur=pesan" class="btn btn-primary btn-sm">[+] Tambah Data Petugas</a>
<br><br>


	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center> ID Petugas </center></th>
			<th><center> Nama Petugas </center></th>
			<th><center> Username </center></th>
			<th><center> Password  </center></th>
			<th><center> Telefon </center></th>
			<th><center> Aksi </center></th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $petugas as $row) : ?>
			<tr>
				
				<td><?= $row["id_petugas"];?></td>
				<td><?= $row["nama_petugas"];?></td>
				<td><?= $row["username"];?></td>
				<td><?= $row["password"];?></td>
				<td><?= $row["telp"];?></td>

				<td>
					<a href="?page=petugas&fitur=ubah&id_petugas=<?= $row["id_petugas"]; ?>" class="btn btn-warning">Ubah</a> |
					<a href="?page=petugas&fitur=hapus&id_petugas=<?= $row["id_petugas"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>