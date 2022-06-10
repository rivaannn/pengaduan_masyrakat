<?php 

$id_pengaduan = $_GET["id_pengaduan"];

if ( hapuspengaduan($id_pengaduan) > 0 ){
	echo "<script>
		alert('Data berhasil Dihapus')
		document.location.href ='?page=pengaduan&fitur=list'
		</script>
		";
}else{
	echo "<script>
		alert('Data Gagal Dihapus')
		//document.location.href ='?page=pengaduan&fitur=list'
		</script>
		";
}

 ?>