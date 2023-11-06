<?php require 'inicio.php'; ?>
    <div class="container_">
        <div class="content first-content_">
            <div class="first-column_">
                <h2 class="title title-primary">Fazer Login</h2>
                <p class="description description-primary">Possui uma conta ?</p>
                <p class="description description-primary">Faça seu Login</p>
               <a href="login.php"><button id="signin" class="btn_ btn-primary">LOGIN</button></a>
            </div>    
            <div class="second-column_">
                <h2 class="title title-second_">Bem vindo!</h2>
                <p class="description description-second">Faça seu Cadastro:</p>
                <form class="form" method="post" action="back_cadastro_user.php">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Name" name="nome" id="id_nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="email" id="id_email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Password" name="senha" id="id_senha">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Re-digite Senha" name="re_senha" id="id_re_senha">
                    </label>
                    
                    <button type="submit" class="btn_ btn-second">SING UP</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->



<!-- 

<form action="back_cadastro_user.php" method="post">
    <h1>Cadastre-se aqui</h1>
    <table class="tab_cadastro">
        <tr>
            <a href=""></a>
            <th><label for="id_nome">Nome:</label></th>
            <th><input type="text" name="nome" id="id_nome"></th>
        </tr>
        <tr>
            <th><label for="id_email">E-mail:</label></th>
            <th><input type="email" name="email" id="id_email" require></th>
        </tr>
        <tr>
            <th><label for="id_senha">Senha:</label></th>
            <th><input type="text" name="senha" id="id_senha"></th>
        </tr>
        <tr>
            <th><label for="id_re_senha">Re-digite Senha:</label></th>
            <th><input type="text" name="re_senha" id="id_re_senha"></th>
        </tr>
    </table>
    <button type="submit" class="button">Enviar</button><br>
</form>
<a href="login.php">Já possui uma conta ?</a>
-->