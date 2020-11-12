<?php  //instrucao para receber a submissao
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
         //declarar variavel $teste pelo name do Form 'buscar_usuario'  para receber a submissao 
         $editar=trim($_POST['buscar_usuario']);    
    }

    //incluir no  BD
    include'gestor.php';
    $gestor = new gestor();

    //array ligado ao Post hidden Buscar_usuario 
    $params=array(
        ':id_usuario'=> $editar //variavel id_usuario recebe o id_usuario  submetido
    );
 
    //criado variavel $usuario ligado ao GESTOR
    $usuario = $gestor->EXE_QUERY("
        SELECT 
            usuario
        FROM users WHERE id_user = :id_usuario",
    $params);
 
    //verificar se ja existe usuario com o id indicado
    if(count($usuario)==0){
        header("Location: index.php"); 
    }   
 ?> 

 <!-- //================Inicio do Container  2 Botao Confirmar Cadastro e texto Usuario Texto--> 
<div class="container teste-menu1 tamanho " style="margin-top: 160px;"> 
    <div class="row mt-3">
        <div class=" col-12 ">      
            <h4 >Editar Usuário</h4>
          
 <!-- =======INICIO FORM campos USUARIO - SENHA - BOTAO ================================================ -->      
                <form action="?p=editar_final" id="formulario2"   method="post"  onsubmit="return compara_senha3()">
                    <div class="form-group">
                        <input type="text" id="id_text_usuario" name="text_usuario"class="form-control" value="<?php echo $usuario[0]['usuario'] ?>" placeholder="Usuario" required autofocus>
                    </div>
                    <h5 >Nova Senha</h5>
                    <div class="form-group">
                        <input type="password" id="id_text_senha" name="text_senha"class="form-control"  placeholder="Senha" required>
                    </div>
                    <h5 >Confirmar nova Senha</h5>
                    <div class="form-group">
                        <input type="password"id="id_text_confirmarsenha" name="text_confirmarsenha"class="form-control"  placeholder="Senha" required>
                        <small onclick="verSenha()" class="dedinho" id="ver_senha">Ver Senha</small>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="id_usuario" value="<?php echo $editar ?>">
                        <input  type="submit"  value="Confirmar Alterações" class="btn btn-primary" >
                        <p><a href="index.php?p=buscar_usuarios">Voltar</a></p> 
                    </div>
                    <!-- recebera o botao do cliquei2 - 4 -->
                    <div id="var_aqui3" class="text-center margem_botao3 "></div>
                    <div id="var_aqui4" class="text-center margem_botao4"></div>
                    <div id="var_aquis" class="text-center margem_botao4"></div>         
                 </form>
   <!-- =======FIM FORM botao_entrar ================================================ -->               
        </div>
        <br>
    </div>
</div>
