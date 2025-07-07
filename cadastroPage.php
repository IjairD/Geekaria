<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Images/miniLogo.png" type="png">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <div class="nav-title">
            <img src="Images/logoGeekaria.png" alt="Logo da Geekaria">
        </div>
    </header>
    <main>
        <div class="container">
            <div class="register-container">
                <h1><span>Cadas</span>tro</h1>
                <form action="cadastro.php" method="post">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" spellcheck="false" required autofocus><br>
                    <label for="celular">Celular</label>
                    <input type="text" id="celular" name="celular" placeholder="(00) 00000-0000" required><br>
                    <label for="user">Usuario</label>
                    <input type="text" id="user" name="user" required><br>
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" required><br>
                    <label for="password2">Confirmar Senha</label>
                    <input type="password" id="password2" name="password2" required>
                    <div class="trigger">
                        <button type="button" class="button" onclick="window.location.href='loginPage.php'">Cancelar</button>
                        <button type="submit" class="button">Criar conta</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require 'geral/rodape.php'?>
    <script src="JS/script.js"></script>
</body>
</html>
