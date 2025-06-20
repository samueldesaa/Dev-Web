<?php
session_start();
if (empty($_SESSION['autenticado'])) {
    header('Location: login.php');
    exit;
}

include 'conexao.php';

// >>> MOVEMOS PARA O TOPO <<<

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = trim($_POST['nome']);
    $preco = $_POST['preco'];
    $pasta = ($preco == "5") ? "Itens5/" : "Itens10/";
    $imagem = $pasta . $nome . '.png';
    $stmt = $pdo->prepare("UPDATE itens SET nome = ?, imagem = ?, valor = ? WHERE id = ?");
    $stmt->execute([$nome, $imagem, $preco, $id]);
    header("Location: gerenciar.php");
    exit;
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $stmt = $pdo->prepare("DELETE FROM itens WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: gerenciar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gerenciar Brindes</title>
    <link rel="shortcut icon" href="Team Two.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            color: #333;
            padding: 3rem 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            max-width: 900px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            padding-bottom: 6rem;
        }

        h1 {
            color: #764ba2;
            margin: 0 0 1.5rem 0;
            font-weight: 600;
        }

        form {
            width: 100%;
            margin-bottom: 1.5rem;
        }

        .upload-box {
            border: 2px dashed #764ba2;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 20px;
            background: #f5f5f5;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upload-box:hover,
        .upload-box.dragover {
            background-color: #e6e0f7;
        }

        input[type="file"] {
            display: none;
        }

        select,
        input[type="submit"] {
            padding: 12px;
            margin: 10px 0;
            border-radius: 30px;
            border: 2px solid #764ba2;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: border-color 0.3s ease;
            width: 100%;
            max-width: 300px;
            cursor: pointer;
        }

        select:focus,
        input[type="submit"]:focus {
            outline: none;
            border-color: #5a3580;
        }

        input[type="submit"] {
            background-color: #764ba2;
            color: white;
            box-shadow: 0 6px 15px rgba(118, 75, 162, 0.6);
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="submit"]:focus {
            background-color: #5a3580;
            outline: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(118, 75, 162, 0.5);
        }

        th,
        td {
            padding: 12px;
            border: none;
            text-align: center;
            font-weight: 600;
            background: #f5f5f5;
            color: #764ba2;
        }

        th {
            background-color: #764ba2;
            color: #fff;
            font-weight: 700;
        }

        img {
            width: 60px;
            border-radius: 8px;
            box-shadow: 0 0 8px #764ba2;
        }

        a {
            color: #764ba2;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions a {
            margin: 0 5px;
        }

        /* Edit form inside the table */
        .edit-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .edit-form input[type="text"],
        .edit-form select {
            border-radius: 12px;
            border: 2px solid #764ba2;
            padding: 8px 12px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            max-width: 200px;
        }

        .edit-form input[type="submit"] {
            border-radius: 30px;
            background-color: #764ba2;
            color: white;
            padding: 10px 20px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-form input[type="submit"]:hover,
        .edit-form input[type="submit"]:focus {
            background-color: #5a3580;
            outline: none;
        }

        /* Back button */
        .btn-back {
            position: absolute;
            top: 1em;
            left: 1em;
            z-index: 999;
            background-color: #764ba2;
            color: #fff;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(118, 75, 162, 0.5);
            transition: background-color 0.3s ease;
        }

        .btn-back:hover,
        .btn-back:focus {
            background-color: #5a3580;
            outline: none;
        }
    </style>
</head>

<body>

    <button class="btn-back" onclick="window.location.href='logout.php'">← Voltar ao Login</button>


    <div class="container">
        <h1>Gerenciar Brindes</h1>

        <form method="POST" enctype="multipart/form-data">
            <div class="upload-box" onclick="document.getElementById('inputFiles').click();">
                <p><strong>Arraste suas imagens aqui ou clique para selecionar</strong></p>
                <input type="file" id="inputFiles" name="imagens[]" multiple>
            </div>

            <select class="preco" name="preco" required>
                <option value="">Esses brindes são de quanto?</option>
                <option value="5">R$ 5</option>
                <option value="10">R$ 10</option>
            </select>

            <input type="submit" name="upload" value="Enviar imagens">
        </form>

        <?php
        if (isset($_POST['upload']) && !empty($_FILES['imagens']['name'][0])) {
            $preco = $_POST['preco'];
            $pasta = ($preco == "5") ? "../Itens5/" : "../Itens10/";
            $dbPath = ($preco == "5") ? "Itens5/" : "Itens10/";

            foreach ($_FILES['imagens']['name'] as $index => $nomeOriginal) {
                $tmp = $_FILES['imagens']['tmp_name'][$index];
                $nomeBase = pathinfo($nomeOriginal, PATHINFO_FILENAME);
                $destino = $pasta . $nomeBase . '.png';

                if (move_uploaded_file($tmp, $destino)) {
                    $imagemDb = $dbPath . $nomeBase . '.png';
                    $stmt = $pdo->prepare("INSERT INTO itens (nome, imagem, valor) VALUES (?, ?, ?)");
                    $stmt->execute([$nomeBase, $imagemDb, $preco]);
                    echo "<p style='color: green; font-weight: 600;'>✅ '$nomeBase.png' enviado e salvo com sucesso!</p>";
                } else {
                    echo "<p style='color: #cc0066; font-weight: 600;'>❌ Falha ao enviar '$nomeOriginal'.</p>";
                }
            }
            echo "<meta http-equiv='refresh' content='2'>";
        }

        $itens = $pdo->query("SELECT * FROM itens ORDER BY id DESC")->fetchAll();
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td><img src="../<?= htmlspecialchars($item['imagem']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>"></td>
                        <td>R$ <?= $item['valor'] ?></td>
                        <td class="actions">
                            <a href="?editar=<?= $item['id'] ?>">Editar</a> |
                            <a href="?excluir=<?= $item['id'] ?>" onclick="return confirm('Excluir este item?')">Excluir</a>
                        </td>
                    </tr>

                    <?php if (isset($_GET['editar']) && $_GET['editar'] == $item['id']): ?>
                        <tr>
                            <td colspan="5">
                                <form method="POST" class="edit-form">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <input type="text" name="nome" value="<?= $item['nome'] ?>" required>
                                    <select name="preco" required>
                                        <option value="5" <?= $item['valor'] == 5 ? 'selected' : '' ?>>R$ 5</option>
                                        <option value="10" <?= $item['valor'] == 10 ? 'selected' : '' ?>>R$ 10</option>
                                    </select>
                                    <input type="submit" name="editar" value="Salvar">
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>

</html>
