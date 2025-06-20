<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Conecta ao MySQL (sem selecionar o banco ainda)
try {
    $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria o banco de dados
    $pdo->exec("DROP DATABASE IF EXISTS teamtwo");
    $pdo->exec("CREATE DATABASE IF NOT EXISTS teamtwo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo "<p>✅ Banco de dados 'teamtwo' criado com sucesso.</p>";

    // Conecta ao banco recém-criado
    $pdo = new PDO("mysql:host=$host;dbname=teamtwo;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela 'itens'
    $sqlTabela = "
        CREATE TABLE IF NOT EXISTS itens (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            imagem VARCHAR(255) NOT NULL,
            valor INTEGER NOT NULL
        );
    ";
    $pdo->exec($sqlTabela);
    echo "<p>✅ Tabela 'itens' criada com sucesso.</p>";

} catch (PDOException $e) {
    echo "<p>❌ Erro: " . $e->getMessage() . "</p>";
}
?>
