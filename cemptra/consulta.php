<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Consultar dados CEMPTRA</title>
  </head>
  <body>

<?php
if (isset($_POST['busca'])) {
    $consulta = $_POST['busca'];
} else {
    $consulta = "";
}

include "conexao.php";

$sql = "SELECT * FROM cemptra WHERE nome LIKE '%$consulta%' ";

$dados = mysqli_query($conexao, $sql);
?>
    <div class="container">
        <div class="row">
            <div class="col">
              <center><h1>Cadastro Realizado com Sucesso!</h1></center><br>
              <h2>Consulte seus dados!</h2>

              <nav class="navbar navbar-light bg-light">
                  <form class="form-inline" href="consulta.php" method="POST">
                     <input class="form-control mr-sm-2" type="search" placeholder="Nome do usuário" name="busca" autofocus>
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Consultar</button>
                  </form>
              </nav>
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Usuário</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
    </tr>
  </thead>
  <tbody>

<?php
      if ($dados) {  // Verificar se a consulta foi bem-sucedida
        while ($linha = mysqli_fetch_assoc($dados)) 
        {
        $id = $linha['id'];
        $usuario = $linha['usuario'];
        $email = $linha['email'];
        $senha = $linha['senha'];

        echo "<tr>
            <th scope='row'>$usuario</th>
            <td>$email</td>
            <td>$senha</td>
        </td>
    </tr>";
       }
     } else {
    echo "Erro na consulta: " . mysqli_error($conexao);
   };

?>
  </tbody>
</table>                            
             <a href="principal.html" class="btn btn-info">Voltar à página principal</a>
            </div>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>