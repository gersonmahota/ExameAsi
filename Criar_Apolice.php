<?php

// Dados para acesso à base de dados.
$servername = "localhost";
$username = "i31";
$password = "asi";
$db_name = "insurance";

// Dados levados do formulário.
$NUIT = $_POST['NUIT'];
$id_apolice = $_POST['id_apolice'];
$tipo_apolice = $_POST['tipo_apolice'];
$montante = $_POST['montante'];
$data_inicio = $_POST['data_inicio'];

// Objecto para conexão à base de dados.
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$statement = "INSERT INTO Policy VALUES ('$NUIT', '$id_apolice', '$tipo_apolice', $montante, '$data_inicio')";

if ($conn->query($statement)) {
    echo("Ap&ogravelice registada com sucesso! :) <br>");
    echo ("<a href='index.html'>Voltar &agrave; p&aacute;gina principal.</a>");
} else {
    echo("Erro: " . $statement . "<br>" . $conn->error);
}

$conn->close();