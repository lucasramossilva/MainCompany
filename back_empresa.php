<?php
    require 'inicio.php';

    if (
        !empty($_POST['nome_fantasia']) && !empty($_POST['razao_social'])
        && !empty($_POST['ramo_de_atuacao']) && !empty($_POST['cnpj'])
        && !empty($_POST['data_de_inicio_da_atividade']) && !empty($_POST['senha'])
        && !empty($_POST['email'])
    ){
        if ($_POST['senha'] == $_POST['re_senha']) {
            // Conecta no banco de dados
            require "conecta_bd.php";

            // Verifica se o email já está em uso
            $email = $_POST['email'];
            $stmt = $db->prepare("SELECT id_empresas FROM empresas WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Este email já está em uso. Por favor, escolha outro!";
                ?> 
                <br><br> <a href="index.php"><button class="button" >Voltar</button></a>
                <?php            
            } else {
                // Prepare a consulta SQL com marcadores de posição
                $nome = $_POST['nome_fantasia'];
                $razao_social = ($_POST['razao_social']);
                $ramo_de_atuacao = ($_POST['ramo_de_atuacao']);
                $cnpj = ($_POST['cnpj']);
                $data_de_atividade = ($_POST['data_de_inicio_da_atividade']);
                $senha = md5($_POST['senha']);
                $email = ($_POST['email']);
                require 'timezone.php';
                $data_cadastro = date("Y-m-d");
                $stmt = $db->prepare("INSERT INTO empresas (id_empresas, nome_fantasia, razao_social, ramo_de_atuacao, cnpj, data_de_inicio_da_atividade, senha, email) 
                VALUES (null, :nome_fantasia, :razao_social, :ramo_de_atuacao, :cnpj, :data_de_inicio_da_atividade, :senha, :email)");

                // Associe os valores aos marcadores de posição
                $stmt->bindParam(':nome_fantasia', $nome);
                $stmt->bindParam(':razao_social', $razao_social);
                $stmt->bindParam(':ramo_de_atuacao', $ramo_de_atuacao);
                $stmt->bindParam(':cnpj', $cnpj);
                $stmt->bindParam(':data_de_inicio_da_atividade', $data_de_atividade);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);

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
    }else {
        echo "Por favor, preencha todos os campos!";
    }

    require 'fim.php';
?>