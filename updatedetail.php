<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$DetailID = $_POST['DetailID'];
$PenjualanID = $_POST['PenjualanID'];
$ProdukID = $_POST['ProdukID'];
$JumlahProduk = $_POST['JumlahProduk'];
$SubTotal = $_POST['SubTotal'];
 
// update data ke database
mysqli_query($conn,"update detail_penjualan set PenjualanID='$PenjualanID', ProdukID='$ProdukID', JumlahProduk='$JumlahProduk', SubTotal='$SubTotal' where DetailID='$DetailID'");
 
// mengalihkan halaman kembali ke index.php

header("location:detailpenjualan.php");
 
?>