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

    "SELECT * FROM users

    WHERE username='$username'

    AND password='$password'"

);

$user = mysqli_fetch_assoc(
    $query
);

if($user){

    echo json_encode([

        "success" => true,

        "user" => $user

    ]);

}else{

    echo json_encode([
        "success" => false
    ]);

}