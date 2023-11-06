<?php
    require 'inicio.php';

    if (
        !empty($_POST['nome']) && !empty($_POST['email'])
        && !empty($_POST['senha']) && !empty($_POST['re_senha'])
    ) {
        if ($_POST['senha'] == $_POST['re_senha']) {
            // Conecta no banco de dados
            require "conecta_bd.php";

            // Verifica se o email já está em uso
            $email = $_POST['email'];
            $stmt = $db->prepare("SELECT id_usuarios FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Este email já está em uso. Por favor, escolha outro!";
                ?> 
                <br><br> <a href="index.php"><button class="button" >Voltar</button></a>
                <?php            
            } else {
                // Prepare a consulta SQL com marcadores de posição
                $nome = $_POST['nome'];
                $senha = md5($_POST['senha']);
                $email = ($_POST['email']);
                require 'timezone.php';
                $data_cadastro = date("Y-m-d");
                $stmt = $db->prepare("INSERT INTO usuarios (id_usuarios, nome, email, senha, data_cadastro) 
                VALUES (null, :nome, :email, :senha, :data_cadastro)");

                // Associe os valores aos marcadores de posição
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':data_cadastro', $data_cadastro);

                // Execute a consulta
                if ($stmt->execute()) {
                    echo "Cadastro registrado com sucesso!";
                } else {
                    echo "Erro, não foi possível realizar o cadastro no banco de dados";
                }
            }
        } else {
            echo "As senhas não conferem";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
    require 'fim.php';
?>