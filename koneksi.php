<?php
    //koneksi Database
    $server = "localhost";
    $user = "root";
    $password = "123456";
    $database = "dbcrud_modal";

    //buat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
?>