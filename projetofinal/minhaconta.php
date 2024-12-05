<?php
include("db.php");
include("processa_login.php");
include("validalogin.php");

$sql = "SELECT nome, email, senha, nasc, gen FROM usuario WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $login_usuario_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $nome_user = $row['nome'];
    $email_user = $row['email'];
    $senha_user = $row['senha'];
    $datanascimento_user = $row['nasc'];
    $genero_user = $row['gen'];
} else {
    echo "Erro: Não foi possível buscar as informações do usuário.";
    exit;
}
$mensagem = isset($_GET['mensagem']) ? urldecode($_GET['mensagem']) : "";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/minhaconta.css">
    <title>Minha Conta</title>
</head>

<body>
    <header>
        <a class="opcoes" href="home.php">Voltar</a>
        <a class="opcoes" href="logout.php">Sair</a>
    </header>

    <form action="processa_minhaconta.php" method="POST">
    
     <br>
     <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome_user) ?>" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_user) ?>" required>

    <label for="senha">Senha:</label>
<input type="password" id="senha" name="senha" value="<?= htmlspecialchars($senha_user) ?>" required>

    <label for="datanascimento">Data de Nascimento:</label>
    <input type="date" id="datanascimento" name="datanascimento" value="<?= htmlspecialchars($datanascimento_user) ?>" required>

    <label for="genero">Gênero:</label>
    <select id="genero" name="genero" required>
        <option value="masculino" <?= $genero_user === 'masculino' ? 'selected' : '' ?>>Masculino</option>
        <option value="feminino" <?= $genero_user === 'feminino' ? 'selected' : '' ?>>Feminino</option>
    </select>
    <br><br>
    <?php if (!empty($mensagem)): ?>
        <div class="mensagem_sucesso">
            <?= htmlspecialchars($mensagem) ?>
        </div>
    <?php endif; ?>
    <br>
    <!-- Botões -->
    <button type="submit" name="btn_alterar">Alterar Dados</button>
    <br><br>
    <button type="submit" name="btn_excluir">Excluir Conta</button>
    <br><br>
</form>

    <br><br><br><br>
    <footer>
        <a class="rodape">Durandal Technology ©</a>
    </footer>
</body>
</html>