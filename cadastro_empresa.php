<?php require "inicio.php"?>
    <h1>Cadastre sua Empresa</h1>
    <form action="back_empresa.php" method="post">
        <label for="id_nome">Nome Fantasia</label>
        <input type="text" name="nome_fantasia" id="id_nome"><br>

        <label for="id_razao">Razão social</label>
        <input type="text" name="razao_social" id="id_razao"><br>

        <label for="id_ramo">Ramo de autação</label>
        <input type="text" name="ramo_de_atuacao" id="id_ramo"><br>

        <label for="id_cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="id_cnpj"><br>

        <label for="id_dat_inicio">Data de inicio</label>
        <input type="text" name="data_de_inicio_da_atividade" id="id_dat_inicio"><br>

        <label for="id_senha">Senha</label>
        <input type="text" name="senha" id="id_senha"><br>

        <label for="id_re_senha">Redigite a Senha</label>
        <input type="text" name="re_senha" id="id_re_senha"><br>

        <label for="id_email">E-mail</label>
        <input type="text" name="email" id="id_email"><br>
        
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login_empresa.php"><label for="">Já possui uma conta ?</label></a> 
<?php require "fim.php"?>
