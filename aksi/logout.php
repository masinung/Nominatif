<?php 
// mengaktifkan session
session_start();
unset($_SESSION['status']);
// menghapus semua session
session_destroy();



// mengalihkan halaman sambil mengirim pesan logout
header("location:../");
?>