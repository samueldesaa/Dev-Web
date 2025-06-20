<?php
include 'conexao.php';

header('Content-Type: application/json');

$itens5 = $pdo->query("SELECT * FROM itens WHERE valor = 5")->fetchAll(PDO::FETCH_ASSOC);
$itens10 = $pdo->query("SELECT * FROM itens WHERE valor = 10")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'items5' => $itens5,
    'items10' => $itens10
], JSON_UNESCAPED_SLASHES);
?>