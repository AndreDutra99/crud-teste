<?php
require 'db.php';
// Inclui o arquivo db.php que contém a configuração de conexão com o banco de dados

try {
  $stmt = $conn->query('SELECT * FROM users');
  // Executa uma consulta SQL para selecionar todos os registros da tabela "users"

  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // Obtém todos os resultados da consulta como um array associativo
} catch(PDOException $e) {
  echo 'Erro ao ler os registros: ' . $e->getMessage();
  // Em caso de erro, exibe uma mensagem de erro
}
?>

