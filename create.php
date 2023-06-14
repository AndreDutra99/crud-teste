<?php
require 'db.php';
// Inclui o arquivo db.php que contém a configuração de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o método de requisição é POST

  $name = $_POST['name'];
  // Obtém o valor do campo "name" do formulário

  $email = $_POST['email'];
  // Obtém o valor do campo "email" do formulário

  $phone = $_POST['phone'];
  // Obtém o valor do campo "phone" do formulário

  try {
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)");
    // Prepara a consulta SQL para inserir um novo registro na tabela "users"

    $stmt->bindParam(':name', $name);
    // Vincula o parâmetro ":name" ao valor obtido do campo "name"

    $stmt->bindParam(':email', $email);
    // Vincula o parâmetro ":email" ao valor obtido do campo "email"

    $stmt->bindParam(':phone', $phone);
    // Vincula o parâmetro ":phone" ao valor obtido do campo "phone"

    $stmt->execute();
    // Executa a consulta SQL para inserir o novo registro

    header("Location: index.php");
    exit();
    // Redireciona o usuário de volta para a página inicial após a inserção do registro
  } catch(PDOException $e) {
    echo 'Erro ao criar o registro: ' . $e->getMessage();
    // Em caso de erro, exibe uma mensagem de erro
  }
}
?>

