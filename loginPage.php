<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Images/miniLogo.png" type="png">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="nav-title">
            <img src="Images/logoGeekaria.png" alt="Logo da Geekaria">
        </div>
    </header>
    <main>
        <div class="container">
            <div class="login-container">
                <h1><span>log</span>in</h1>
                <?php
                    session_start();

                    if (isset($_SESSION['mensagem'])) {
                        echo "<p style='color: red; text-align: center; margin-top: 10px;'> {$_SESSION['mensagem']} </p>";
                        unset($_SESSION['mensagem']);
                    }
                ?>
                <form action="login.php" method="post">
                    <label for="user">Usuario</label>
                    <input type="text" id="user" name="user" spellcheck="false" required autofocus><br>
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" require>
                    <div class="trigger">
                        <button type="button" class="button" onclick="window.location.href='cadastroPage.php'">Criar conta</button>
                        <button type="submit" class="button">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require 'geral/rodape.php'?>
</body>
</html>