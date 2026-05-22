<?php

include "db.php";

$user_id = $_GET['user_id'];

$data = [];

$query = mysqli_query(

    $conn,

    "SELECT * FROM messages

    WHERE user_id='$user_id'

    ORDER BY id DESC"

);

while($row = mysqli_fetch_assoc($query)){

    $data[] = $row;

}

echo json_encode($data);