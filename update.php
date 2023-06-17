<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o método da requisição é POST

  $id = $_POST['id'];
  $carro = $_POST['carro'];
  $marca = $_POST['marca'];
  $cor = $_POST['cor'];
  $ano = $_POST['ano'];
  $estado = $_POST['estado'];

  // Obtém os dados enviados via formulário

  try {
    $stmt = $conn->prepare("UPDATE users SET carro = :carro, marca = :marca, cor = :cor, ano = :ano , estado = :estado WHERE id = :id");
    // Prepara a consulta SQL para atualizar o registro na tabela "users"

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':carro', $carro);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':cor', $cor);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':estado', $estado);
    // Vincula os parâmetros aos valores obtidos do formulário

    $stmt->execute();
    // Executa a consulta SQL para atualizar o registro

    header("Location: index.php");
    exit();
    // Redireciona o usuário de volta para a página inicial após a atualização do registro
  } catch(PDOException $e) {
    echo 'Erro ao atualizar o registro: ' . $e->getMessage();
    // Em caso de erro, exibe uma mensagem de erro
  }
} elseif (isset($_GET['id'])) {
  // Verifica se o parâmetro "id" está presente na URL

  $id = $_GET['id'];

  // Obtém o valor do parâmetro "id"

  try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    // Prepara a consulta SQL para buscar o registro na tabela "users" com o ID especificado

    $stmt->bindParam(':id', $id);
    // Vincula o parâmetro ao valor obtido da URL

    $stmt->execute();
    // Executa a consulta SQL

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Obtém o resultado da consulta

    if (!$user) {
      echo 'Registro não encontrado.';
      exit();
      // Se o registro não for encontrado, exibe uma mensagem de erro e encerra a execução
    }
  } catch(PDOException $e) {
    echo 'Erro ao buscar o registro: ' . $e->getMessage();
    // Em caso de erro, exibe uma mensagem de erro
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsável pela responsividade do site-->
    <link rel="stylesheet" href="carro.css"> 
  <title>Editar Automóvel</title>
</head>
<body>
  <h1 class="center-div">Editar Automóvel Cadastrado</h1>

  <?php if (isset($user)): ?>
    <!-- Verifica se o usuário existe e exibe o formulário de edição -->

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <!-- O formulário é enviado para a mesma página -->

      <fieldset>
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <!-- Cria um campo oculto com o ID do veiculo -->

      <label for="carro">Carro:</label>
      <input type="text" name="carro" value="<?php echo $user['carro']; ?>"><br><br>
      <!-- Campo de entrada para o nome do veiculo -->

      <label for="marca">Marca:</label>
      <input type="text" name="marca" value="<?php echo $user['marca']; ?>"><br><br>
      <!-- Campo de entrada para a cor do carro -->

      <label for="cor">Cor:</label>
      <input type="text" name="cor" value="<?php echo $user['cor']; ?>"><br><br>
      <!-- Campo de entrada para a cor do carro -->

      <label for="ano">Ano:</label>
      <input type="text" name="ano" value="<?php echo $user['ano']; ?>"><br><br>
      <!-- Campo de entrada para o ano do veiculo -->

      <label for="estado">Estado:</label>
      <input type="text" name="estado" value="<?php echo $user['estado']; ?>"><br><br>
      <!-- Campo de entrada para o estado do veiculo -->

      <button type="submit">Salvar</button>
      <!-- Botão de envio do formulário -->
      <button type="reset">Limpar</button>
      </fieldset>

    </form>

  <?php endif; ?>
  <!-- Fim do bloco condicional -->

</body>
</html>


