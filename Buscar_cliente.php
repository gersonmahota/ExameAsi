<?php

// Dados para acesso à base de dados.
$servername = "localhost";
$username = "i31";
$password = "asi";
$db_name = "insurance";

// Dados levados do formulário.
$tipo_apolice = $_POST['tipo_apolice'];

// Objecto para conexão à base de dados.
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$statement = "SELECT NUIT, Name, Address, ContactNo, PolicyID, PolicyType, Amount, StartDate FROM Customer c JOIN Policy p ON c.NUIT = p.NUIT WHERE PolicyType LIKE '%$tipo_apolice%'";
$result = mysqli_query($conn, $statement);

echo("<table><tr><th>NUIT</th><th>Name</th><th>Address</th><th>ContactNo</th><th>PolicyId</th><th>PolicyType</th><th>Ammount</th><th>Start Date</th> </tr>");

while($row = mysqli_fetch_array($conn, MYSQLI_ASSOC)) {
    
    echo("<td>". $row['NUIT'] . "</td>");
    echo("<td>". $row['Address'] . "</td>");
    echo("<td>". $row['ContactNo'] . "</td>");
    echo("<td>". $row['PolicyID'] . "</td>");
    echo("<td>". $row['PolicyType'] . "</td>");
    echo("<td>". $row['Amount'] . "</td>");
    echo("<td>". $row['StartDate'] . "</td>");
}

echo("</table>");

$conn->close();