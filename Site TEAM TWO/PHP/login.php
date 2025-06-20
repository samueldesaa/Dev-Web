<?php
session_start();
include 'config.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senhaDigitada = $_POST['senha'] ?? '';

    if ($senhaDigitada === SENHA_ADMIN) {
        $_SESSION['autenticado'] = true;
        header('Location: gerenciar.php');
        exit;
    } else {
        $erro = 'Senha incorreta!';
    }
}

if (!empty($_SESSION['autenticado'])) {
    header('Location: gerenciar.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Gerenciar Brindes</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
        }

        .container {
            background: #fff;
            max-width: 400px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            text-align: center;
        }

        h2 {
            color: #764ba2;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        form {
            width: 100%;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 1rem 0 1.5rem;
            border-radius: 12px;
            border: 2px solid #764ba2;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s ease;
        }

        input[type="password"]:focus {
            outline: none;
            border-color: #5a3580;
        }

        input[type="submit"] {
            background-color: #764ba2;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 1.2rem 3rem;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 6px 15px rgba(118, 75, 162, 0.6);
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="submit"]:focus {
            background-color: #5a3580;
            outline: none;
        }

        .error {
            color: #cc0066;
            font-weight: 600;
            margin-bottom: 1rem;
            user-select: none;
        }
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
    </style>
</head>

<body>
    <div class="container">
    <button class="btn-back" onclick="window.location.href='../brindes.html'">← Voltar</button>
        <h2>Login para Gerenciar</h2>
        <form method="POST" action="">
            <input type="password" name="senha" placeholder="Digite a senha" required />
            <?php if ($erro): ?>
                <div class="error"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>
            <input type="submit" value="Entrar" />
        </form>
    </div>
</body>

</html>
