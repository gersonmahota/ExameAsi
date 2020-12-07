<?php
// Dados para acesso à base de dados.
$servername = "localhost";
$username = "i31";
$password = "asi";
$db_name = "insurance";

// Dados levados do formulário.
$NUIT = $_POST['NUIT'];
$nome_cliente = $_POST['nome_cliente'];
$endereco = $_POST['endereco'];
$contacto = $_POST['contacto'];

// Objecto para conexão à base de dados.
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Query a ser exectuada.
$statement = "INSERT INTO Customer VALUES ('$NUIT', '$nome_cliente', '$endereco', '$contacto')";

if ($conn->query($statement)) {
    echo("Cliente registado com sucesso! :) <br>");
    echo ("<a href='index.html'>Voltar &agrave; p&aacute;gina principal.</a>");
} else {
    echo("Erro: " . $statement . "<br>" . $conn->error);
}

$conn->close();