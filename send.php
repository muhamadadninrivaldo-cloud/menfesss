<?php

include "db.php";

$data = json_decode(

    file_get_contents(
        "php://input"
    )

);

$tujuan = $data->tujuan;

$nama = $data->nama;

$pesan = $data->pesan;



// =====================
// CARI USER TUJUAN
// =====================

$userQuery = mysqli_query(

    $conn,

    "SELECT * FROM users

    WHERE username='$tujuan'"

);

$user = mysqli_fetch_assoc(
    $userQuery
);



// =====================
// CEK USER ADA
// =====================

if(!$user){

    echo json_encode([

        "success" => false,

        "message" => "User tidak ditemukan"

    ]);

    exit;

}



$user_id = $user['id'];



// =====================
// INSERT MESSAGE
// =====================

$query = mysqli_query(

    $conn,

    "INSERT INTO messages(

        user_id,
        nama,
        pesan

    )

    VALUES(

        '$user_id',
        '$nama',
        '$pesan'

    )"

);



if($query){

    echo json_encode([

        "success" => true

    ]);

}else{

    echo json_encode([

        "success" => false

    ]);

}