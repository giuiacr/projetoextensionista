<?php
$mensagem = isset($_GET['mensagem']) ? urldecode($_GET['mensagem']) : "";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="processa_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            <br><br> 
            
            <?php if (!empty($mensagem)): ?>
                <div class="mensagem_sucesso">
                 <?= htmlspecialchars($mensagem) ?>
            </div>
            <?php endif; ?>
            <br>
            <button type="submit" name="btn_entrar" id="btn_entrar">Entrar</button>
            <br><br>
            Não tem uma conta? <a class="inscrevase" href="inscricao.php">Inscreva-se
           
        </form>
    </div>
    <footer>
        <a class="rodape">Durandal Technology ©</a>
    </footer>
</body>
</html>