<?php
	include "conn.php";
    $get = $_GET['get'];

	if ($get == 'data_barang') {
		if(isset($_POST['update'])){
			$kode_barang 	= $_POST['kode_barang'];
			$nama_barang 	= $_POST['nama_barang'];
			$harga_barang 	= $_POST['harga_barang'];
			$stok_barang 	= $_POST['stok_barang'];
			$kode_jenis 	= $_POST['kode_jenis'];
			
			$update = mysqli_query($conn, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', harga_barang='$harga_barang', stok_barang='$stok_barang', kode_jenis='$kode_jenis' WHERE kode_barang='$kode_barang'") or die(mysqli_error());
			if($update){
				echo "<script>alert('Data Berhasil di Update!'); window.location = 'index.php'</script>";
			}else{
				echo "<script>alert('Data Gagal di Update!'); window.location = 'index.php'</script>";
			}
		}
	}elseif ($get == 'jenis_barang') {
		
		if(isset($_POST['update'])){
			$kode_jenis 	= $_POST['kode_jenis'];
			$jenis_barang 	= $_POST['jenis_barang'];
			
			$update = mysqli_query($conn, "UPDATE jenis_barang SET kode_jenis='$kode_jenis', jenis_barang='$jenis_barang' WHERE kode_jenis='$kode_jenis'") or die(mysqli_error());
			if($update){
				echo "<script>alert('Data Berhasil di Update!'); window.location = 'jenis_barang.php'</script>";
			}else{
				echo "<script>alert('Data Gagal di Update!'); window.location = 'jenis_barang.php'</script>";
			}
		}
	}elseif ($get == 'data_penjualan') {
		if(isset($_POST['update'])){
			$kode_penjualan 	= $_POST['kode_penjualan'];
			$kode_barang 		= $_POST['kode_barang'];
			$tanggal_transaksi 	= $_POST['tanggal_transaksi'];
			$jumlah_terjual 	= $_POST['jumlah_terjual'];
			$total_harga 		= $_POST['total_harga'];
			
			$update = mysqli_query($conn, "UPDATE penjualan SET kode_penjualan='$kode_penjualan', kode_barang='$kode_barang', tanggal_transaksi='$tanggal_transaksi', jumlah_terjual='$jumlah_terjual', total_harga='$total_harga' WHERE kode_penjualan='$kode_penjualan'") or die(mysqli_error());
			if($update){
				echo "<script>alert('Data Berhasil di Update!'); window.location = 'data_penjualan.php'</script>";
			}else{
				echo "<script>alert('Data Gagal di Update!'); window.location = 'data_penjualan.php'</script>";
			}
		}
	}
?>