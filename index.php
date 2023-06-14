<!DOCTYPE html>
<html>
<head>
  <title>CRUD</title>
</head>
<body>
  <h1>CRUD</h1>
  
  <form action="create.php" method="POST">
    <label for="name">Nome:</label>
    <input type="text" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="phone">Telefone:</label>
    <input type="text" name="phone" required><br>

    <input type="submit" value="Adicionar">
  </form>

  <h2>Dados dos Carros</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
    <?php
    require 'read.php';
    foreach ($users as $user) {
      echo "<tr>";
      echo "<td>" . $user['id'] . "</td>";
      echo "<td>" . $user['name'] . "</td>";
      echo "<td>" . $user['email'] . "</td>";
      echo "<td>" . $user['phone'] . "</td>";
      echo "<td><a href='update.php?id=" . $user['id'] . "'>Editar</a> | <a href='delete.php?id=" . $user['id'] . "'>Excluir</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
