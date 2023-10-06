<?php
// Conexão com o banco de dados (substituir com as próprias configurações)
$host = "localhost";
$username = "root";
$password = "";
$database = "cemptra";

$conexao = mysqli_connect($host, $username, $password, $database);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>