<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat" );


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	// mysqli_fecth_assoc adalah fungsi yang menghasilkan array assosiative yang mana indexnya sesuai dengan nama kolom yang di seleksi
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}

	// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return $rows;
}

function tambahtanggapan($data){
global $conn;

// ambil data dari tiap elemen dalam form
$query = "SELECT max(id_tanggapan) as maxKode FROM tanggapan";
$hasil = mysqli_query($conn,$query);
$kodeOto = mysqli_fetch_array($hasil);
$kodePengaduan = $kodeOto['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'PGD001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodePengaduan, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "TGP";
$kodePengaduan = $char . sprintf("%03s", $noUrut);
	$id_pengaduan = htmlspecialchars($data["id_pengaduan"]);
	$tgl_tanggapan = htmlspecialchars($data["tgl_tanggapan"]);
	$tanggapan = htmlspecialchars($data["tanggapan"]);
	$id_petugas = htmlspecialchars($data["id_petugas"]);

// query insert data
	$query = "INSERT INTO tanggapan
	VALUES
	('$kodePengaduan', '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapustanggapan($id_tanggapan) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tanggapan WHERE id_tanggapan ='$id_tanggapan'");

	// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);
}

function ubahtanggapan($data) {
	global $conn;

	$id_tanggapan = $data["id_tanggapan"];
	$id_pengaduan = htmlspecialchars($data["id_pengaduan"]);
	$tgl_tanggapan = htmlspecialchars($data["tgl_tanggapan"]);
	$tanggapan = htmlspecialchars($data["tanggapan"]);
	$id_petugas = htmlspecialchars($data["id_petugas"]);
// query insert data
	$query = "UPDATE tanggapan SET
	id_pengaduan = '$id_pengaduan',
	tgl_tanggapan = '$tgl_tanggapan',
	tanggapan = '$tanggapan',
	id_petugas = '$id_petugas'
	WHERE id_tanggapan = $id_tanggapan

	";

	mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi tersebut.
	return mysqli_affected_rows($conn);

}

function tambahpengaduan($data) {
	global $conn;

// ambil data dari tiap elemen dalam form
$query = "SELECT max(id_pengaduan) as maxKode FROM pengaduan";
$hasil = mysqli_query($conn,$query);
$kodeOto = mysqli_fetch_array($hasil);
$kodePengaduan = $kodeOto['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'PGD001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodePengaduan, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "PGD";
$kodePengaduan = $char . sprintf("%03s", $noUrut);
	$tgl_pengaduan = htmlspecialchars($data["tgl_pengaduan"]);
	$nik = htmlspecialchars($data["nik"]);
	$isi_laporan = htmlspecialchars($data["isi_laporan"]);
	// uploud foto
	$foto = uploud($kodePengaduan);
	if ( !$foto ) {
		// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
		return false;
	 }

	$status ="tunggu";

// query insert data
	$query = "INSERT INTO pengaduan
	VALUES
	('$kodePengaduan', '$tgl_pengaduan', '$nik', '$isi_laporan', '$foto', '$status')
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function uploud($foto) {

	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada foto yang di uploud
	if ( $error === 4 ) {
		echo "<script>
		alert('pilih foto dahulu!')
		</script>";
		// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
		return false;
	}

	// cek apakah yg diuploud itu foto atau bukan
	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
		echo "<script>
		alert('yang anda uploud bukan foto!')
		</script>";
		// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
		return false;
	}

// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ){ 
		echo "<script>
		alert('Foto yang anda uploud terlalu besar!')
		</script>";
		// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
		return false;

	}

	// lolos pengecekkan, foto siap di uploud
	// generate nama foto baru
	$namaFileBaru = $foto;
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFoto;

	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return $namaFileBaru;

}

function ubahpengaduan($data) {
	global $conn;

	$id_pengaduan = $data["id_pengaduan"];
	$tgl_pengaduan = htmlspecialchars($data["tgl_pengaduan"]);
	$nik = htmlspecialchars($data["nik"]);
	$isi_laporan = htmlspecialchars($data["isi_laporan"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);

	// cek apakah user pilih foto baru atau tidak
	if( $_FILES['foto'] === 4 ){
		$foto = $fotoLama;
	} else {
		$foto = uploud($id_pengaduan);
	}
	

// uploud foto
	$foto = uploud($id_pengaduan);
	if( !$foto ){
		// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
		return false;
	}


// query insert data
	$query = "UPDATE pengaduan SET
	tgl_pengaduan = '$tgl_pengaduan',
	nik = '$nik',
	isi_laporan = '$isi_laporan',
	foto = '$foto'
	WHERE id_pengaduan='$id_pengaduan'
	"; 

	mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);

}

function hapuspengaduan($id_pengaduan) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");

	// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);
}

function tambahmasyarakat($data){
global $conn;

// ambil data dari tiap elemen dalam form
$nik = htmlspecialchars($data["nik"]);
$nama = htmlspecialchars($data["nama"]);
$username = htmlspecialchars($data["username"]);
$password = htmlspecialchars($data["password"]);
$telp = htmlspecialchars($data["telp"]);
$alamat = htmlspecialchars($data["alamat"]);
$level = "user";
// query insert data
$query = "INSERT INTO masyarakat
VALUES
('$nik', '$nama', '$username', '$password', '$telp', '$alamat', '$level')
";

mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
return mysqli_affected_rows($conn);
}

function hapusmasyarakat($nik) {
	global $conn;
	mysqli_query($conn, "DELETE FROM masyarakat WHERE nik ='$nik'");

	// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);
}

function ubahmasyarakat($data) {
	global $conn;

	$nik = htmlspecialchars($data["nik"]);
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$telp = htmlspecialchars($data["telp"]);
	$alamat = htmlspecialchars($data["alamat"]);
// query insert data
	$query = "UPDATE masyarakat SET
	nama = '$nama',
	username = '$username',
	password = '$password',
	telp = '$telp',
	alamat = '$alamat'
	WHERE nik='$nik'

	";

	mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);

}

function tambahpetugas($data){
global $conn;

// ambil data dari tiap elemen dalam form
// ambil data dari tiap elemen dalam form
$query = "SELECT max(id_petugas) as maxKode FROM petugas";
$hasil = mysqli_query($conn,$query);
$kodeOtomatis = mysqli_fetch_array($hasil);
$kodePetugas = $kodeOtomatis['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'PGD001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodePetugas, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "PTG";
$kodePetugas = $char . sprintf("%03s", $noUrut);
$nama_petugas = htmlspecialchars($data["nama_petugas"]);
$username = htmlspecialchars($data["username"]);
$password = htmlspecialchars($data["password"]);
$telp = htmlspecialchars($data["telp"]);
$level = "petugas";
// query insert data
$query = "INSERT INTO petugas
VALUES
('$kodePetugas', '$nama_petugas', '$username', '$password', '$telp', '$level')
";

mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
return mysqli_affected_rows($conn);
}

function hapuspetugas($id_petugas) {
	global $conn;
	mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");

	// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);
}

function ubahpetugas($data) {
	global $conn;

	$id_petugas = htmlspecialchars($data["id_petugas"]);
	$nama_petugas = htmlspecialchars($data["nama_petugas"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$telp = htmlspecialchars($data["telp"]);
// query insert data
	$query = "UPDATE petugas SET
	nama_petugas = '$nama_petugas',
	username = '$username',
	password = '$password',
	telp = '$telp'
	WHERE id_petugas='$id_petugas'

	";

	mysqli_query($conn, $query);

// return mengembalikkan, menghentikan,, dan mengembalikkan nilai yang telah di hasilkan fungsi
	return mysqli_affected_rows($conn);

}

?>