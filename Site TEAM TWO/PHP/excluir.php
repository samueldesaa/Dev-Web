<?php include 'conexao.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM itens WHERE id = ?");
$stmt->execute([$id]);
header("Location: listar.php");
?>
