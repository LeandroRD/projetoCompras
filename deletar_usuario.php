<?php  //instrucao para receber a submissao
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        //declarar variavel $teste pelo name do Form 'buscar_usuario'  para receber asubimissao 
        $editar=$_POST['deletar_usuario'];  
    }

//incluir o sistema de gestao
include'gestor.php';
$gestor = new gestor();//Instanciar a variavel $gestor na classe gestor.php

//array ligado ao $teste 
$params=array(
    ':id_usuario2'=> $editar
);
$usuario = $gestor->EXE_QUERY("
     SELECT 
         usuario
     FROM users WHERE id_user = :id_usuario2",
$params);
//verificar se existe usuario com o id indicado
 if(count($usuario)==0){
     header("Location: index.php"); 
 }
?>
<!-- =============================================================================== -->

<script>
function mostrar_caixa(){
    //alert("Ola teste de caixa de alerta");}
    var resultado = confirm("Confirma a alteração?");

    if (resultado ==false){
    

      document.write ();
     window.location.replace("index.php?p=cadastro");
    }
    }
    </script>

<div class="container">
        <div class="row">
            <div class="offset-3 col-6 text-center">
                <?php if(!empty($erro_newsletter)) : ?>
                    <div class="alert alert-danger"id="frase_erro">
                        <?php echo $erro_newsletter?>
                    </div>
                <?php endif;?>
                <!-- Se a variavel $sucesso_newsletter for diferente de vazio -->
                <?php if(!empty($sucesso_newsletter)): ?>
                <!-- Tipo de alerta -->
                <div class="alert alert-success"id="frase_success">
                <!-- Frase da variavel $sucesso_newsletter -->
                <?php echo $sucesso_newsletter?>
                 </div>
                <?php endif;?>
            </div>
        </div>

        <script>
                $('#frase_erro').delay(2000).fadeOut('slow');
        </script>
        <script>
              $('#frase_success').delay(2000).fadeOut('slow');
        </script>
          
    </div>
    <!-- //================Fim do Container 1  Alert Danger-->
    
    <!-- //================Inicio do Container  2 Botao Confirmar Cadastro e texto Usuario Texto-->
    
    <div class="container">
    
        <div class="row mt-3">
            <div class="offset-4 col-4">
                <div class="row">
                    <div class="col=8">
                    <h3 >Deletar Usuário   :  </h3>
                    </div>     
                    &nbsp;&nbsp;<div class="col=4">
                 <h3 class="color-red"><?php echo $usuario[0]['usuario'] ?></h3>
                 </div>
                
    <!-- =======INICIO FORM Confirmar Eliminação ? ================================================ -->      
    <form action="deletar_final.php" method="post">
    

                <!-- Esta guardando no name="formulario" o value="email" -->     
                <!-- erro de email nao digitado======= -->
                <?php if(!empty($erro)) : ?>
                    <div >
                        <div style="color:red;"><?php echo $erro;?></div>
                    </div>
                <?php endif; ?>
                 
                <div class="form-group">
               
                        <!-- <input type="text"name="text_usuario"class="form-control" value="<?php echo $usuario[0]['usuario'] ?>" placeholder="Usuario" required autofocus> -->
                    </div>
                    
                    <!-- <div class="form-group">
                            <input type="text"name="text_senha"class="form-control" placeholder="Senha" required>
                    </div> -->

        <div >
            <input type="hidden" name="id_usuario" value="<?php echo $editar ?>">
            <!-- vai sair esse hidden -->
            <!-- <input type="hidden" name="formulario" value="botao_entrar"> -->
            <input  type="submit" onclick="mostrar_caixa()" value="Confirmar Eliminação ? " class="btn btn-primary" >
            <p><br><a href="index.php?p=buscar_usuarios">Voltar</a></p> 
        </div> 
        
    </form>
    
      <!-- =======FIM FORM botao_entrar ================================================ -->      
           
            </div>
        </div>
    </div>
    </div> 

