<?php   //recebendo Submit do Editar_Usuario.php
        $id_usuario= trim($_POST['id_usuario']);
        $usuario = trim($_POST['text_usuario']);
        $senha =  password_hash($_POST['text_senha'], PASSWORD_DEFAULT);
    
        
        //abrir a ligacao a bd
        include'gestor.php';
        $gestor = new gestor();
    
        //verificar se ja existe outro usuario com o mesmo nome
        $params =array(
            // ':id_usuario'=>$id_usuario,
            ':usuario0'=>$usuario,
            // ':senha'=>$senha
        );

        $params2 =array(
            ':id_usuario'=>$id_usuario,
            ':usuario'=>$usuario,
            ':senha'=>$senha
        );
        $resultado = $gestor->EXE_QUERY("
        SELECT 
            usuario 
        FROM users
        WHERE
            usuario = :usuario0
        ",$params);
        
        // se ja existir apresentar a mensagem de erro
        if(count($resultado) !=0){    
            echo'
            <div class="container tamanho "style="margin-top: 150px;"> 
                <div class="row mt-3" >
                <div class=" col-12">      
                    <h4 >Editar Usuário</h4>
                
                    <!-- =======INICIO FORM campos USUARIO - SENHA - BOTAO ================================================ -->      
                    <form action="?p=editar_final" id="formulario5" method="post"  onsubmit="return compara_senha5()">
                         <!-- Esta guardando no name="formulario" o value="email" -->     
                         <!-- erro de email nao digitado======= -->        
                        <div class="form-group">
                            <input type="text" id="id_text_usuario5" name="text_usuario"class="form-control" value="'.$usuario.'" placeholder="Usuario" required autofocus>
                            <h6 class="color-red">Já existe usuário com este nome</h6> 
                        </div>
                        <h5 >Nova Senha</h5>
                        <div class="form-group">
                            <input type="password" id="id_text_senha5" name="text_senha2"class="form-control"  placeholder="Senha" required>
                        </div>
                        <h5 >Confirmar nova Senha</h5>
                        <div class="form-group">
                            <input type="password"id="id_text_confirmarsenha5" name="text_confirmarsenha"class="form-control"  placeholder="Senha" required>
                            <small onclick="verSenha2()" class="dedinho" id="ver_senha">Ver Senha</small>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                            <input  type="submit"  value="Confirmar Alterações" class="btn btn-primary" >
                            <p><a href="index.php?p=buscar_usuarios">Voltar</a></p> 
                        </div>

                        <div id="var_aqui5" class="text-center margem_botao5 ">1</div>
                        <div id="var_aqui5_1" class="text-center margem_botao5_1">2</div>
                        <div id="var_aquis2" class="text-center margem_botao4"></div>    
                    </form>
                </div>
            </div>
        </div>';
             return;
        }            
        //se nao existe, atualizando os dados no usuario selecionad
        $gestor->EXE_NON_QUERY("
        UPDATE users
            SET
                usuario = :usuario,
                senha = :senha,
                updated_at = NOW()
            WHERE 
                id_user = :id_usuario
        ", $params2);
        
        echo'
        <script>
          window.location.replace("index.php?p=buscar_usuarios");
        </script>       
        ';
        
        