<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
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

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a.button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 7px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #555;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Penjualan</h2>

        <form method="post" action="updatepenjualan.php">
            <table>
                <?php
                include 'koneksi.php';
                $PenjualanID = $_GET['PenjualanID'];
                $data = mysqli_query($conn,"select * from penjualan where PenjualanID='$PenjualanID'");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr> 
                    <td>Tanggal Penjualan</td>
                    <td>
                        <input type="hidden" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>">
                        <input type="text" name="TanggalPenjualan" value="<?php echo $d['TanggalPenjualan']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td><input type="text" name="TotalHarga" value="<?php echo $d['TotalHarga']; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr> 
                <?php 
                }
                ?>
            <a href="penjualan.php" class="button">Kembali</a>
            </table>
        </form>
        
    </div>
</body>
</html>
