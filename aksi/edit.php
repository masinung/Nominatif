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
        $sql = "UPDATE data_nominatif SET nama = '$nama', pangkat = '$pangkat', jabatan = '$jabatan', kesatuan = '$kesatuan', tmt_awal = '$tmt_awal', tmt_akhir = '$tmt_akhir' WHERE data_nominatif.nrp = $nrp";
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