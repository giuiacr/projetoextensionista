<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_entrar'])) {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para verificar se o usuário existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";

    // Prepara a consulta para evitar SQL Injection
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Verifica se encontrou o usuário
    if (mysqli_num_rows($result) > 0) {
        // Obtém os dados do usuário e armazena na sessão
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logado'] = true;
        // Redireciona para a página home.php
        header("Location: home.php");
        exit;
    } else {
        header("Location: login.php?mensagem=Senha ou login incorretos!");
    }

    // Fecha a conexão
    mysqli_close($con);
}
?>