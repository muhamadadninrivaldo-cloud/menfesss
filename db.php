<?php

// =========================
// KONEK DATABASE
// =========================

$host = "127.0.0.1";

$user = "root";

$password = "";

$database = "ngl_app";



// =========================
// CONNECT MYSQL
// =========================

$conn = mysqli_connect(

    $host,
    $user,
    $password,
    $database

);



// =========================
// CEK KONEKSI
// =========================

if(!$conn){

    die(

        "Database gagal connect : "

        . mysqli_connect_error()

    );

}



// =========================
// SET UTF8
// =========================

mysqli_set_charset(

    $conn,

    "utf8"

);

?>