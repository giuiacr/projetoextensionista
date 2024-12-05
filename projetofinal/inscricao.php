<?php
include("processa.php");
$mensagem = isset($_GET['mensagem']) ? urldecode($_GET['mensagem']) : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inscricao.css">
    <title>Login</title>
</head>
<body>

    <!-- Formulário para envio dos dados -->
    <form action="processa.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required >

        <label for="datanascimento">Data de Nascimento:</label>
        <input type="date" id="datanascimento" name="datanascimento" required>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" required>
            <option value="" disabled selected>Escolha</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select>
        <br>
        <br>
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem_sucesso">
                 <?= htmlspecialchars($mensagem) ?>
            </div>
        <?php endif; ?>
        <!-- Botão de envio -->
         <br><br>
        <button type="submit" name="btn_enviar" id="btn_enviar">Enviar</button>
        <br><br>
        Já tem uma conta? <a class="facalogin" href="login.php">Faça login
    </form>
    <footer>
        <a class="rodape">Durandal Technology ©</a>
    </footer>
</body>
</html>