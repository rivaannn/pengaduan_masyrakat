<?php
$id_petugas = $_GET["id_petugas"];

if ( hapuspetugas($id_petugas) > 0 ){
	echo "<script>
		alert('Data berhasil Dihapus')
		document.location.href = '?page=petugas&fitur=list'
		</script>
		";
}else{
	echo "<script>
		alert('Data Gagal Dihapus')
		document.location.href = '?page=petugas&fitur=list'
		</script>
		";
}

 ?>