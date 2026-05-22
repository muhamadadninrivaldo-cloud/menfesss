<?php

include "db.php";

$data = json_decode(
    file_get_contents("php://input")
);

$username = $data->username;

$password = md5(
    $data->password
);

$query = mysqli_query(

    $conn,

    "INSERT INTO users(

        username,
        password

    )

    VALUES(

        '$username',
        '$password'

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