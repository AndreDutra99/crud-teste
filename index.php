<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsável pela responsividade do site-->
    <link rel="stylesheet" href="carro.css"> 
  <title>Cadastro Veículos</title>
</head>
<body>
  <h1 class="center-div">CRUD - Senac 2023</h1>
  <p class="center-div">Aluno: André Santos</p>
  
  <form action="create.php" method="POST">
    <fieldset>
      <legend>Cadastro de Veículos</legend>
    <label for="carro">Carro:</label>
    <input type="text" name="carro" required><br>

    <label for="marca">Marca:</label>
    <input type="text" name="marca" required><br>

    <label for="cor">Cor:</label>
    <input type="text" name="cor" required><br>

    <label for="ano">Ano:</label>
    <input type="text" name="ano" required><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" required><br>
    <br>
    <button type="submit">Cadastrar</button>
    <button type="reset">Limpar</button>
    </fieldset>
    
  </form>
  <br>
  <hr>
  <br>
  <table>
    <caption>
    Veículos cadastrados
    </caption>
    <tr>
      <th>ID</th>
      <th>Carro</th>
      <th>Marca</th>
      <th>Cor</th>
      <th>Ano</th>
      <th>Estado</th>
      <th>Ações</th>
    </tr>
    <?php
    require 'read.php';
    foreach ($users as $user) {
      echo "<tr>";
      echo "<td>" . $user['id'] . "</td>";
      echo "<td>" . $user['carro'] . "</td>";
      echo "<td>" . $user['marca'] . "</td>";
      echo "<td>" . $user['cor'] . "</td>";
      echo "<td>" . $user['ano'] . "</td>";
      echo "<td>" . $user['estado'] . "</td>";
      echo "<td><a href='update.php?id=" . $user['id'] . "'>Editar</a> | <a href='delete.php?id=" . $user['id'] . "'>Excluir</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
