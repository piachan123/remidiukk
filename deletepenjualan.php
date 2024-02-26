<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$PenjualanID = $_GET['PenjualanID'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from penjualan where PenjualanID='$PenjualanID'");
 
// mengalihkan halaman kembali ke index.php
header("location:penjualan.php");
 
?>