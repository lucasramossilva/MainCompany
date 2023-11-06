<?php require "inicio.php"?>
    <div class="container_">
        <div class="content first-content_">
            <div class="first-column_">
                <h2 class="title title-primary">Fazer cadastro</h2>
                <p class="description description-primary">Ainda não possui uma conta ?</p>
                <p class="description description-primary">Faça um cadastro</p>
               <a href="cadastro_usuario.php"><button id="signin" class="btn_ btn-primary">CADASTRO</button></a>
            </div>    
            <div class="second-column_">
                <h2 class="title title-second_">Bem vindo!</h2>
                <p class="description description-second">Faça login:</p>
                <form class="form" method="post" action="back_login.php">
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
                    
                    <button type="submit" class="btn_ btn-second">LOGIN</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
