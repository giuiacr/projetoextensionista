<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    // Redireciona para a página de login se não estiver logado
    header("Location: login.php");
    exit;
}

// Dados do usuário logado
$login_usuario_id = $_SESSION['id'];
$login_nome = $_SESSION['nome'];
$login_email = $_SESSION['email'];
?>