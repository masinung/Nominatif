<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$false = 0;

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$data_user = mysqli_fetch_assoc($data);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


$uid=$data_user['id_user'];

if ($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../anggota-polres");
}else{
	header("location:../login?pesan=gagal");
}

?>