<?php 
$masyarakat = query("SELECT * FROM masyarakat");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Masyarakat</title>
</head>
<body>

	<h1> Daftar Masyarakat</h1>

<a href="?page=masyarakat&fitur=pesan" class="btn btn-primary btn-sm">[+] Tambah Data Masyarakat</a>
<br><br>


	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center> NIK </center></th>
			<th><center> Nama </center></th>
			<th><center> Username </center></th>
			<th><center> Password  </center></th>
			<th><center> Telefon </center></th>
			<th><center> Alamat </center></th>
			<th><center> Aksi </center></th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach( $masyarakat as $row) : ?>
			<tr>
				
				<td><?= $row["nik"];?></td>
				<td><?= $row["nama"];?></td>
				<td><?= $row["username"];?></td>
				<td><?= $row["password"];?></td>
				<td><?= $row["telp"];?></td>
				<td><?= $row["alamat"];?></td>

				<td>
					<a href="?page=masyarakat&fitur=ubah&nik=<?= $row["nik"]; ?>" class="btn btn-warning">Ubah</a> |
					<a href="?page=masyarakat&fitur=hapus&nik=<?= $row["nik"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>