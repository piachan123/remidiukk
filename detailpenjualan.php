<?php
    //mulai session
    session_start();

    //cek status sudah login
    if($_SESSION['status']!="login")
    {
        header("location:login.php?pesan=belum_login");
    }

    // koneksi ke database
    include 'koneksi.php';

    // Fetch semua data user dari database
    $result = mysqli_query($conn, "SELECT * FROM detail_penjualan ORDER BY DetailID ASC");
?>

<html>
    <head>    
        <title>Homepage</title>
        <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto; /* center the container */
        }

        #produk {
            border-collapse: collapse;
            width: 100%;
        }

        #produk td, #produk th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #produk tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #produk tr:hover {
            background-color: #ddd;
        }

        #produk th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .button {
            display: inline-block;
            background-color: #04AA6D;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }

        .button:hover {
            background-color: #3e8e41;
        }
    </style>
    </head>

   <center><body>
    <h2>Selamat Datang <?php echo $_SESSION['username']; ?> di Halaman Detail Penjualan</h2>

    <div class="container">
        <form method="GET" action="detailpenjualan.php" style="text-align: center;">
            <label>Kata Pencarian : </label>
            <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
            <button type="submit">Cari</button>
        </form>

        <?php 
        if(isset($_GET['kata_cari'])){
            $cari = $_GET['kata_cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
        ?>
        <br>
        <a href="tambahpenjualan.php" class="button">Tambah Detail Penjualan Baru</a>
        
        <table id="produk">
            <tr>
                <th>ID Detail</th> 
                <th>ID Penjualan</th> 
                <th>ID Produk</th> 
                <th>Jumlah Produk</th> 
                <th>Sub Total</th> 
                <th>Aksi</th>
            </tr>
            <?php 
            //untuk meinclude kan koneksi
            include('koneksi.php');
            
            //jika kita klik cari, maka yang tampil query cari ini
            if(isset($_GET['kata_cari'])) {
                //menampung variabel kata_cari dari form pencarian
                $kata_cari = $_GET['kata_cari'];
                
                //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
                $query = "SELECT * FROM detail_penjualan WHERE PenjualanID like '%".$kata_cari."%' OR ProdukID like '%".$kata_cari."%' OR JumlahProduk like '%".$kata_cari."%' OR SubTotal like '%".$kata_cari."%' ORDER BY DetailID ASC";
            } else {
                //jika tidak ada pencarian, default yang dijalankan query ini
                $query = "SELECT * FROM detail_penjualan ORDER BY DetailID ASC";
            }
                
            
            $result = mysqli_query($conn, $query);
            
            if(!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><?php echo $row['DetailID']; ?></td>
                <td><?php echo $row['PenjualanID']; ?></td>
                <td><?php echo $row['ProdukID']; ?></td>
                <td><?php echo $row['JumlahProduk']; ?></td>
                <td><?php echo $row['SubTotal']; ?></td>
                <td><?php echo "<a href='editdetail.php?DetailID=$row[DetailID]'>Edit</a> | <a href='deletedetail.php?DetailID=$row[DetailID]'>Delete</a>"; ?></td>      
            </tr>
            <?php
            }
            ?>

</table>
<a href="dashboard/dist/index.php" class="button">Kembali</a>
    </div>

    </body></center>
</html>