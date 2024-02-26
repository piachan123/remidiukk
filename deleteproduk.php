<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$ProdukID = $_GET['ProdukID'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from produk where ProdukID='$ProdukID'");
 
// mengalihkan halaman kembali ke index.php
header("location:produk.php");
 
?>