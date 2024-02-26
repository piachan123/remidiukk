<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASIR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .notification {
            text-align: center;
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login - Kasir</h2>
        <!-- cek pesan notifikasi -->
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='notification'>Login gagal! username dan password salah!</div>";
                } else if($_GET['pesan'] == "logout"){
                    echo "<div class='notification'>Anda telah berhasil logout</div>";
                } else if($_GET['pesan'] == "belum_login"){
                    echo "<div class='notification'>Anda harus login untuk mengakses halaman admin</div>";
                }
            }
        ?>
        <form method="post" action="cek_login.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password">
            <input type="submit" value="LOGIN">
        </form>
    </div>
</body>
</html>
