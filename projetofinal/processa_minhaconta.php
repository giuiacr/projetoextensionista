<?php
include 'db.php';  // Conexão com o banco
session_start();   // Inicia a sessão para acessar as variáveis de sessão

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Recupera o ID do usuário da sessão
$login_usuario_id = $_SESSION['id'];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_alterar'])) {
        // Obtém os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nascimento = $_POST['datanascimento'];
        $genero = $_POST['genero'];
        $senha = $_POST['senha'];

        // Verifica se os campos estão preenchidos
        if (!empty($nome) && !empty($email) && !empty($nascimento) && !empty($genero) && !empty($senha)) {
            // Atualiza os dados do usuário no banco
            $sql_update = "UPDATE usuario SET nome = ?, email = ?, nasc = ?, gen = ?, senha = ? WHERE id = ?";
            $stmt_update = mysqli_prepare($con, $sql_update);

            if ($stmt_update) {
                mysqli_stmt_bind_param($stmt_update, "sssssi", $nome, $email, $nascimento, $genero, $senha, $login_usuario_id);
                if (mysqli_stmt_execute($stmt_update)) {
                    header("Location: minhaconta.php?mensagem=Dados alterados com sucesso!");
                    exit;
                } else {
                    echo "Erro ao executar a consulta: " . mysqli_stmt_error($stmt_update);
                }
            } else {
                echo "Erro na preparação da consulta: " . mysqli_error($con);
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }

    if (isset($_POST['btn_excluir'])) {
        // Exclui o usuário
        $sql_delete = "DELETE FROM usuario WHERE id = ?";
        $stmt_delete = mysqli_prepare($con, $sql_delete);
        mysqli_stmt_bind_param($stmt_delete, "i", $login_usuario_id);

        if (mysqli_stmt_execute($stmt_delete)) {
            header("Location: login.php?mensagem=Conta excluída com sucesso!");
            session_destroy();
            exit;
        } else {
            die("Erro ao excluir a conta: " . mysqli_stmt_error($stmt_delete));
        }
    }
} else {
    echo "Requisição inválida.";
    exit;
}
?>