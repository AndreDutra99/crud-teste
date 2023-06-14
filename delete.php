<?php
require 'db.php';
// Inclui o arquivo db.php que contém a configuração de conexão com o banco de dados

if (isset($_GET['id'])) {
  // Verifica se o parâmetro "id" está presente na URL

  $id = $_GET['id'];
  // Obtém o valor do parâmetro "id"

  try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    // Prepara a consulta SQL para excluir o registro da tabela "users" com o ID especificado

    $stmt->bindParam(':id', $id);
    // Vincula o parâmetro ao valor obtido da URL

    $stmt->execute();
    // Executa a consulta SQL para excluir o registro

    header("Location: index.php");
    exit();
    // Redireciona o usuário de volta para a página inicial após a exclusão do registro
  } catch(PDOException $e) {
    echo 'Erro ao excluir o registro: ' . $e->getMessage();
    // Em caso de erro, exibe uma mensagem de erro
  }
}
?>

