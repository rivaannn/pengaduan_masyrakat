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


	<table class="table table-bordered" border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th><center> NIK </center></th>
			<th><center> Nama </center></th>
			<th><center> Username </center></th>
			<th><center> Password  </center></th>
			<th><center> Telefon </center></th>
			<th><center> Alamat </center></th>
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
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>