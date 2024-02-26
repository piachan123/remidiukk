<?php
    //mulai session
    session_start();


    //hapus session
    session_destroy();

    //alihkan ke halaman login
    header("location:login.php?pesan=logout");
?>