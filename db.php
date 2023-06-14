<?php
$host = 'localhost';
// O endereço do servidor de banco de dados MySQL. Neste caso, está configurado como "localhost", indicando que o servidor está na mesma máquina.

$dbName = 'carro';
// O nome do banco de dados que será utilizado.

$username = 'root';
// O nome de usuário usado para conectar ao banco de dados. Neste exemplo, está como "root".

$password = '';
// A senha usada para conectar ao banco de dados. Neste exemplo, está vazia, indicando que não há uma senha configurada.

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
  // Cria uma nova instância da classe PDO, responsável por estabelecer a conexão com o banco de dados MySQL.

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Define o modo de tratamento de erros para o modo de exceção, para que as exceções sejam lançadas em caso de erros no banco de dados.
} catch(PDOException $e) {
  echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
  // Em caso de erro na conexão, uma mensagem de erro é exibida na tela.
}
?>
