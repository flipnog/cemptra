<?php 
require_once "conexao.php";

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

echo $usuario, $email, $senha;

// Inserir dados no banco de dados
$query = "INSERT INTO cemptra (usuario, email, senha) VALUES ('$usuario', '$email, '$senha')";

if (mysqli_query($conexao, $query)) {
    echo "<br><center><b>CADASTRO REALIZADO COM SUCESSO!</b></center>";
    header("Location:consulta.php");
} else {
    echo "<br><center><b>ERRO AO CADASTRAR! </b></center> " . mysqli_error($conexao);
}
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>