<?php
    //mulai session
    session_start();

    //cek status sudah login
    if($_SESSION['status']!="login")
    {
        header("location:login.php?pesan=belum_login");
    }

    //konek database
    include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            margin: 50px auto;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        form {
            text-align: left;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table td {
            padding: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #4CAF50;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .notification {
        input[type="submit"]:hover {
            background-color: #45a049;
        }

            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        a.button {
            display: inline-block;
            background-color:#4CAF50;
            color: #fff;
            padding: 7px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['Submit'])) 
    {
        $ProdukID=$_POST['ProdukID'];
        $NamaProduk=$_POST['NamaProduk'];
        $Harga=$_POST['Harga'];
        $Stok=$_POST['Stok'];

        // Memasukan user baru ke table
        $insertdata=mysqli_query($conn,"insert into produk (ProdukID,NamaProduk,Harga,Stok) VALUES('$ProdukID','$NamaProduk','$Harga','$Stok')");

        // Tambahkan pesan ketika berhasil ditambahkan
        echo '<div class="notification">Barang berhasil ditambah.</div>';
    }
    ?>

    <div class="container">
        <h2>Tambah Produk Baru</h2>

        <form method="post" action="tambahproduk.php" name="formtambah">
            <table>
                <tr> 
                    <td>ID Produk</td>
                    <td><input type="text" name="ProdukID" required></td>
                </tr>

                <tr> 
                    <td>Nama Produk</td>
                    <td><input type="text" name="NamaProduk" required></td>
                </tr>

                <tr> 
                    <td>Harga</td>
                    <td><input type="text" name="Harga" required></td>
                </tr>

                <tr> 
                    <td>Stok</td>
                    <td><input type="number" name="Stok" required></td>
                </tr>
                
                <tr> 
                    <td></td>
                    <td><input type="submit" name="Submit" value="Tambah"></td>
                    <a href="produk.php" class="button">Kembali</a>
                </tr>
            </table>
        </form>
        
    </div>
</body>
</html>
