<?php
session_start();
$pagename="mhs-aktif";
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

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-md bg-light navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="mhs-semua">Bank Data Mahasiswa</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Mahasiswa Alumni</a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="mhs-semua">Semua Mahasiswa</a>
                            <a class="dropdown-item" role="presentation" href="mhs-aktif">Mahasiswa Aktif</a>
                            <a class="dropdown-item disabled" role="presentation" href="#">Mahasiswa Alumni</a>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cetak-mhs-alumni" target="_blank">Cetak</a></li>
                </ul><span class="navbar-text actions"> <a class="btn btn-primary action-button" role="button" onclick="window.location.href='aksi/logout'">Keluar</a></span></div>
        </div>
    </nav>
    <div class="container text-dark" style="height: 470px;padding: 10px;">
        <h1 class="text-center">Data Mahasiswa Alumni</h1>
        <div><button class="btn btn-primary" type="button" onclick="window.location.href='data-tambah-mhs'">Tambah Data</button></div>
        <div class="text-center text-sm-center text-md-center" style="padding-bottom: 10px;padding-top: 10px;">
            <form role="form" action="<?php echo $pagename?>" method="GET"> <!--baru -->
                <input class="bg-light border rounded border-dark" type="search" style="margin-right: 0;width: 282px;" placeholder="Cari Di Sini" name="cari">
                <button type="submit" class="regular" style="display:none;"></button>
            </form>
            <?php 
              if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
              }
              ?>
        </div>
        <div class="table-responsive table-borderless">
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
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                            <?php
                            include 'aksi/koneksi.php';

                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                                $halaman = 5;
                                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                $sql = "SELECT * FROM mahasiswa where status ='Alumni' and nama like '%".$cari."%'";
                                $result = mysqli_query($koneksi, $sql);
                                $total = mysqli_num_rows($result);
                                $pages = ceil($total/$halaman); 
                                $sql2 = "SELECT * from mahasiswa where status ='Alumni' and nama like '%".$cari."%' LIMIT $mulai, $halaman" ;          
                                $query = mysqli_query($koneksi, $sql2) or die("Galat !");
                                
                                $no =$mulai+1; 				
                            }else{
                                $halaman = 5;
                                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                $sql = "SELECT * FROM mahasiswa where status ='Alumni'";
                                $result = mysqli_query($koneksi, $sql);
                                $total = mysqli_num_rows($result);
                                $pages = ceil($total/$halaman); 
                                $sql2 = "SELECT * from mahasiswa where status ='Alumni' LIMIT $mulai, $halaman" ;          
                                $query = mysqli_query($koneksi, $sql2) or die("Galat !");
                                
                                $no =$mulai+1; 		
                            }                 
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
                        <td>
                            <?php
                            echo "<a href='data-edit-mhs?id_mhs=".$d['id_mhs'] . "'>Edit</a> | ";
                            echo "<a href='data-hapus-mhs?id_mhs=".$d['id_mhs'] . "'>Hapus</a>";
                            ?>
                        </td>
                    </tr>
                    <?php             
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-justify">
            <nav class="text-right">
                <ul class="pagination">
                        <?php
                            if(isset($_GET['cari'])){
                                ?><li class="page-item"><a class="page-link" href="?cari=<?php echo $cari; ?>&halaman=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li> <?php
                            for ($i=1; $i<=$pages ; $i++){ ?>
                                <li class="page-item"><a class="page-link" href="?cari=<?php echo $cari; ?>&halaman=<?php echo $i; ?> "><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="?cari=<?php echo $cari; ?>&halaman=<?php echo $pages; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            <br>
                            <button class="btn btn-primary" onclick="window.location.href = '<?php echo $pagename?>'" style="margin-left: 10px">Hapus Pencarian</button>
                        <?php
                            } else{
                                ?><li class="page-item"><a class="page-link" href="?halaman=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li> <?php
                            for ($i=1; $i<=$pages ; $i++){ ?>
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $pages; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                           <?php }
                        ?>
                </ul>
            </nav>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline mb-5" data-aos="zoom-in">
            <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" data-bs-hover-animate="tada" target="_blank" href="https://github.com/masinung"><i class="icon-social-github"></i></a></li>
            </ul>
            <p class="text-muted mb-0 small">Copyright &nbsp;© Zainur 2020</p>
        </div><a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a></footer>
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
    <script>
    function goBack() {
    window.history.back();
    }
    </script>
</body>

</html>