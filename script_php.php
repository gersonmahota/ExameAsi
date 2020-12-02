<?php

$servername = "localhost";
$database_name = "turismo_db";
$username = "root";
$password = "0000";
$nome_cidade = $_POST['nome'];

$conn = new mysqli($servername, $username, $password, $database_name);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$statement = "SELECT * FROM cidade WHERE cid_nome LIKE '%$nome_cidade%'";

$result = mysqli_query( $database_name,$statement);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo($row['cid_nome']);
    echo($row['cid_localizacao']);
}

$conn->close();