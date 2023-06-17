<?php
require 'db.php';
// Inclui o arquivo db.php que contém a configuração de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica se o método de requisição é POST

  $carro = $_POST['carro'];
  // Obtém o valor do campo "carro" do formulário

  $marca = $_POST['marca'];
  // Obtém o valor do campo "marca" do formulário

  $cor = $_POST['cor'];
  // Obtém o valor do campo "cor" do formulário

  $ano = $_POST['ano'];
  // Obtém o valor do campo "ano" do formulário

  $estado = $_POST['estado'];
  // Obtém o valor do campo "estado" do formulário

  try {
    $stmt = $conn->prepare("INSERT INTO users (carro, marca, cor, ano, estado) VALUES (:carro, :marca, :cor, :ano, :estado)");
    // Prepara a consulta SQL para inserir um novo registro na tabela "users"

    $stmt->bindParam(':carro', $carro);
    // Vincula o parâmetro ":carro" ao valor obtido do campo "carro"

    $stmt->bindParam(':marca', $marca);
    // Vincula o parâmetro ":marca" ao valor obtido do campo "marca"

    $stmt->bindParam(':cor', $cor);
    // Vincula o parâmetro ":cor" ao valor obtido do campo "cor"

    $stmt->bindParam(':ano', $ano);
    // Vincula o parâmetro ":ano" ao valor obtido do campo "ano"

    $stmt->bindParam(':estado', $estado);
    // Vincula o parâmetro ":estado" ao valor obtido do campo "estado"

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

