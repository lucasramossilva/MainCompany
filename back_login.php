<?php
session_start();
require "conecta_bd.php";

// Função para verificar a senha
function verificaSenha($senhaDigitada, $senhaHash) {
    return md5($senhaDigitada) === $senhaHash;
}

// Função para redirecionar para a página de login
function redirecionarParaLogin() {
    header("Location: pag_login.php");
    exit();
}

if (isset($_POST['email']) && isset($_POST['senha'])) {
    // Verifica se o formulário foi submetido com campos de email e senha

    $email = $_POST['email'];
    $senhaDigitada = $_POST['senha'];

    // Consulta o banco de dados para encontrar um usuário com o email fornecido
    $stmt = $db->prepare("SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if (verificaSenha($senhaDigitada, $usuario['senha'])) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome'];

            require 'inicio.php';
            echo "<h1>Seja bem-vindo \"{$usuario['nome']}\"!</h1>";
            echo "<p>O seu e-mail é {$usuario['email']}</p>";
            require 'fim.php';
        } else {
            // Senha incorreta, redireciona para o login
            redirecionarParaLogin();
        }
    } else {
        // Usuário não encontrado, redireciona para o login
        redirecionarParaLogin();
    }

} else {
    // Se o formulário não for preenchido corretamente
    require 'inicio.php';
    echo "Por favor, preencha todos os campos!<br><br>";
    echo '<a href="pag_login.php">Voltar para página Login!</a>';
    require 'fim.php';
}
?>
