<?php include 'conexao.php'; ?>
<h2>Itens</h2>
<a href="adicionar.php">Adicionar novo item</a>
<table border="1">
  <tr><th>ID</th><th>Nome</th><th>Imagem</th><th>Ações</th></tr>
  <?php
    $sql = $pdo->query("SELECT * FROM itens");
    foreach ($sql as $item) {
        echo "<tr>
          <td>{$item['id']}</td>
          <td>{$item['nome']}</td>
          <td><img src='{$item['imagem']}' width='50'></td>
          <td>
            <a href='editar.php?id={$item['id']}'>Editar</a> |
            <a href='excluir.php?id={$item['id']}'>Excluir</a>
          </td>
        </tr>";
    }
  ?>
</table>
