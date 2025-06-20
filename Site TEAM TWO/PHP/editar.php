<?php include 'conexao.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM itens WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();
?>
<h2>Editar Item</h2>
<form method="POST">
  Nome: <input type="text" name="nome" value="<?= $item['nome'] ?>"><br>
  Caminho da Imagem: <input type="text" name="imagem" value="<?= $item['imagem'] ?>"><br>
  <input type="submit" value="Atualizar">
</form>
<?php
if ($_POST) {
    $stmt = $pdo->prepare("UPDATE itens SET nome = ?, imagem = ? WHERE id = ?");
    $stmt->execute([$_POST['nome'], $_POST['imagem'], $id]);
    echo "Item atualizado. <a href='listar.php'>Voltar</a>";
}
?>
