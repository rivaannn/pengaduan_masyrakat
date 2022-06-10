<?php 

$id_tanggapan = $_GET["id_tanggapan"];

if ( hapustanggapan($id_tanggapan) > 0 ){
	echo "<script>
		alert('Data berhasil Dihapus')
		document.location.href = '?page=tanggapan&fitur=list'
		</script>
		";
}else{
	echo "<script>
		alert('Data Gagal Dihapus')
		document.location.href = '?page=tanggapan&fitur=list'
		</script>
		";
}

 ?>