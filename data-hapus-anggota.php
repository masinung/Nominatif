<?php

include("aksi/koneksi.php");

if( isset($_GET['nrp']) ){
	
	// ambil id dari query string
	$nrp = $_GET['nrp'];
	
	// buat query hapus
	$sql = "DELETE FROM data_nominatif WHERE nrp=$nrp";
	$query = mysqli_query($koneksi, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: anggota-polres');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>
