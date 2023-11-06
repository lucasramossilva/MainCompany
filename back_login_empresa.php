<?php
    session_start();
    require "conecta_bd.php";

    // Função para verificar a senha
    function verificaSenha($senhaDigitada, $senhaHash) {
        return md5($senhaDigitada) === $senhaHash;
    }

    // Função para redirecionar para a página de login
    function redirecionarParaLogin() {
        header("Location: login_empresa.php");
        exit();
    }

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Verifica se o formulário foi submetido com campos de email e senha

        $email = $_POST['email'];
        $senhaDigitada = $_POST['senha'];

        // Consulta o banco de dados para encontrar um usuário com o email fornecido
        $stmt = $db->prepare("SELECT id_empresa, nome_fantasia, email, senha FROM empresa WHERE email = ?");
        $stmt->execute([$email]);

        $empresa = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($empresa) {
            if (verificaSenha($senhaDigitada, $empresa['senha'])) {
                $_SESSION['id_empresa'] = $empresa['id_empresa'];
                $_SESSION['nome'] = $empresa['nome_fantasia'];

                require 'inicio.php';
                echo "<h1>Seja bem-vindo \"{$empresa['nome_fantasia']}\"!</h1>";
                echo "<p>O seu e-mail é {$empresa['email']}</p>";
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
