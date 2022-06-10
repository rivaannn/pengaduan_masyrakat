<?php 
$nik = $_GET["nik"];

if ( hapusmasyarakat($nik) > 0 ){
	echo "<script>
		alert('Data berhasil Dihapus')
		document.location.href ='?page=masyarakat&fitur=list'
		</script>
		";
}else{
	echo "<script>
		alert('Data Gagal Dihapus')
		document.location.href ='?page=masyarakat&fitur=list'
		</script>
		";
}

 ?>