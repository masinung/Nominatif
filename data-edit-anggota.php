<?php
session_start();
include("aksi/koneksi.php");
if($_SESSION['status'] !="login"){
	header("location:login");
}
$nrp = $_GET['nrp'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM data_nominatif WHERE nrp=$nrp";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Data</title>
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
        <div class="container"><a class="navbar-brand" href="#">Data Nominatif Anggota Polres Pasuruan</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"> <a class="btn btn-warning action-button" role="button" onclick="window.location.href='aksi/logout'">Keluar</a></span></div>
        </div>
    </nav>
    <div class="container">
        <div class="form-group" style="height: 680px;">
            <div class="row register-form" style="height: 680px;">
                <div class="col-md-8 offset-md-2" style="height: 680px;">
                    <form method="POST" action="aksi/edit" class="custom-form">
                        <h1>Edit Data</h1>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Nama&nbsp;</label></div>
                            <div class="col-sm-6 input-column">
                                <input type="hidden" class="form-control" value="<?php echo $siswa['nrp']?>" name="nrp">
                                <input class="form-control" type="text" name="nama" required="" value="<?php echo $siswa['nama']?>"></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Pangkat</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" required="" name="pangkat" value="<?php echo $siswa['pangkat']?>"></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Jabatan</label></div>
                            <div class="col-sm-6 input-column"><textarea class="form-control" name="jabatan" ><?php echo $siswa['jabatan'] ?></textarea></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Kesatuan</label></div>
                            <div class="col-sm-4 text-left input-column">
                                <select class="border rounded custom-select multiselect-ui form-control" id="kesatuan" name="kesatuan" style="width: 110px;">
                            <?php if ($siswa['status'] == "Aktif"){ ?>
                                <option value="Polres Pasuruan" selected="">Polres Pasuruan</option>
                                <option value="Mutasi">Mutasi</option>
                           <?php } else{ ?>
                                <option value="Polres Pasuruan">Polres Pasuruan</option>    
                                <option value="Mutasi" selected="">Mutasi</option>
                          <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">TMT Awal</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="date" name="tmt_awal" value="<?php echo $siswa['tmt_awal']?>"></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">TMT Akhir</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="date" name="tmt_akhir" value="<?php echo $siswa['tmt_akhir']?>"></div>
                        </div>
                        <button class="btn btn-light submit-button" type="submit" name="submit" style="background-color: rgb(26,180,69);">Simpan</button>
                        <button class="btn btn-light submit-button" type="button" style="background-color: rgb(228,83,83);" onclick="goBack()">Batal</button></form>
                </div>
            </div>
        </div>
    </div>
    <!-- <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline mb-5" data-aos="zoom-in">
            <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" data-bs-hover-animate="tada" target="_blank" href="https://github.com/masinung"><i class="icon-social-github"></i></a></li>
            </ul>
            <p class="text-muted mb-0 small">Copyright &nbsp;© Zainur 2020</p>
        </div><a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a></footer> -->
        
    <script>
    function goBack() {
    window.history.back();
    }
    </script>
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
</body>

</html>