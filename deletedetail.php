<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$DetailID = $_GET['DetailID'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from detail_penjualan where DetailID='$DetailID'");
 
// mengalihkan halaman kembali ke index.php
header("location:detailpenjualan.php");
 
?>