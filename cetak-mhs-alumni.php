<?php
session_start();
if($_SESSION['status'] !="login"){
	header("location:login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mahasiswa Alumni</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Mega-Menu-Dropdown-100-Editable---Ambrodu.css">
    <link rel="stylesheet" href="assets/css/Multi-Select-Dropdown-by-Jigar-Mistry.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/select2.css">
</head>

<body>
    <h1 class="text-center">Data Mahasiswa Alumni</h1>
    <div class="table-responsive table-bordered">
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nomor</th>
                        <th class="text-center">ID Data</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                            <?php
                            include 'aksi/koneksi.php';
                                $sql = "SELECT * FROM mahasiswa where status='Alumni'";         
                                $query = mysqli_query($koneksi, $sql) or die("Galat !");
                                
                                $no = 1;                    
                                while ($d = mysqli_fetch_assoc($query)) {
                            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_mhs']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['angkatan']; ?></td>
                        <td><?php echo $d['status']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['tgl_lahir']; ?></td>
                    </tr>
                    <?php             
                    } 
                    ?>
                </tbody>
            </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/stylish-portfolio.js"></script>
    <script src="assets/js/Multi-Select-Dropdown-by-Jigar-Mistry.js"></script>
    <script src="assets/js/select2-1.js"></script>
    <script src="assets/js/select2-2.js"></script>
    <script src="assets/js/select2-3.js"></script>
    <script src="assets/js/select2-4.js"></script>
    <script src="assets/js/select2-5.js"></script>
    <script src="assets/js/select2-6.js"></script>
    <script src="assets/js/select2.js"></script>
    <script> window.print(); </script>
</body>

</html>