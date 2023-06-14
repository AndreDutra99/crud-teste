<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o método da requisição é POST

  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // Obtém os dados enviados via formulário

  try {
    $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id");
    // Prepara a consulta SQL para atualizar o registro na tabela "users"

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
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
  <title>Editar Usuário</title>
</head>
<body>
  <h1>Editar Usuário</h1>

  <?php if (isset($user)): ?>
    <!-- Verifica se o usuário existe e exibe o formulário de edição -->

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <!-- O formulário é enviado para a mesma página -->

      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <!-- Cria um campo oculto com o ID do usuário -->

      <label for="name">Nome:</label>
      <input type="text" name="name" value="<?php echo $user['name']; ?>"><br><br>
      <!-- Campo de entrada para o nome do usuário -->

      <label for="email">Email:</label>
      <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
      <!-- Campo de entrada para o email do usuário -->

      <label for="phone">Telefone:</label>
      <input type="tel" name="phone" value="<?php echo $user['phone']; ?>"><br><br>
      <!-- Campo de entrada para o telefone do usuário -->

      <input type="submit" value="Salvar">
      <!-- Botão de envio do formulário -->
    </form>

  <?php endif; ?>
  <!-- Fim do bloco condicional -->

</body>
</html>


