<?php
      include "koneksi.php";
      if(isset($_POST['submit'])){
	
        // ambil data dari formulir
        
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $pangkat = $_POST['pangkat'];
        $jabatan = $_POST['jabatan'];
        $kesatuan = $_POST['kesatuan'];
        $tmt_awal = $_POST['tmt_awal'];
        $tmt_akhir = $_POST['tmt_akhir'];

        
        // buat query
        $sql = "INSERT INTO data_nominatif (nrp, nama, pangkat, jabatan, kesatuan, tmt_awal, tmt_akhir) VALUES ('$nrp', '$nama', '$pangkat', '$jabatan', '$kesatuan', '$tmt_awal', '$tmt_akhir')";
        $query = mysqli_query($koneksi, $sql);
        
        // apakah query simpan berhasil?
        if( $query ) {
          // kalau berhasil alihkan ke halaman index.php dengan status=sukses
          header('Location: ../anggota-polres?status=sukses');
        } else {
          // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
          header('Location: ../anggota-polres?status=gagal');
        }
        
        
      } else {
        die("Akses dilarang...");
      }
     
    ?>