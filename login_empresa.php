<?php require "inicio.php"?>
<h1 class="titulo">Faça login com sua empresa</h1>
<div class="log">
    <div class="main">
        <div class="formulario">
            <form class="form" action="back_login_empresa.php" method="post"> 
                <label for="id_nome">Nome da empresa:</label>
                <input type="text" name="nome" id="id_nome"><br>

                <label for="id_email">E-mail:</label>
                <input type="text" name="email" id="id_email"><br>
                    
                <label for="id_senha">Senha</label>
                <input type="text" name="senha" id="id_senha"><br>

                <button type="submit" class="button">Entrar</button>
            </form> 
        </div>
    </div>
</div>

<a href="cadastro_empresa.php"><label for="">Não possui uma conta ?</label></a> 
<?php require "fim.php"?>
