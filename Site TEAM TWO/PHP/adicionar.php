<?php include 'conexao.php'; ?>
<h2>Adicionar Item</h2>
<form method="POST">
  Nome: <input type="text" name="nome"><br>
  Caminho da Imagem: <input type="text" name="imagem"><br>
  <input type="submit" value="Salvar">
</form>
<?php
if ($_POST) {
    $stmt = $pdo->prepare("INSERT INTO itens (nome, imagem) VALUES (?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['imagem']]);
    echo "Item adicionado com sucesso. <a href='listar.php'>Voltar</a>";
}
?>
