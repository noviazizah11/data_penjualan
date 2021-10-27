<?php
	include "conn.php";
	if(isset($_POST['update'])){
		$nim	       = $_POST['nim'];
		$nama		   = $_POST['nama'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$alamat        = $_POST['alamat'];
		$notelp        = $_POST['notelp'];
		
		$update = mysqli_query($koneksi, "UPDATE data SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', notelp='$notelp' WHERE nim='$nim'") or die(mysqli_error());
		if($update){
			echo "<script>alert('Data Berhasil di Update!'); window.location = 'index.php'</script>";
		}else{
			echo "<script>alert('Data Gagal di Update!'); window.location = 'index.php'</script>";
		}
	}
?>