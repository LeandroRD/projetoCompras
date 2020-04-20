<?php 
//==================================INICIO PHP============================
//declara variaveis  = vazio
$erro_newsletter='';
$sucesso_newsletter='';
//$caixa_alerta='';


//=======================iniciar o cadastro de usuario=====================


if($_SERVER['REQUEST_METHOD'] == 'POST' ){
//====qundo clicar o botao Confirmar Cadastro
    //recebe a submissao botao_entrar pelo POST
    if($_POST['formulario']=='botao_entrar'){
        
        //liga bando de dados gestor (BD newsletter)   
        
        include 'gestor.php';
        //Instancia para a variavel gestor
        $gestor = new gestor();
        //Recebe o usuario e a senha
        $usuario = $_POST['text_usuario'];
        $senha = $_POST['text_senha'];
        //faz um array de seguranca para selecionar
        
        
        
        
        $params=array(
            ':seguranca'=>$usuario
        );
        


  //verificar se ja existe e-mail na base de dados criando a variavel resultado
  $resultado = $gestor->EXE_QUERY("SELECT usuario FROM users WHERE usuario = :seguranca",$params);
  //se resultado por diferente de 0
  if(count($resultado)!=0){
    //email ja esta registrado
    $erro_newsletter="O usuario ja esta registrado";
}

else{


    
//faz um array de seguranca para gravar
  $params = array(
      ':usuario_gravar'=> $_POST['text_usuario'],
      ':passwrd_gravar'=> password_hash($_POST['text_senha'], PASSWORD_DEFAULT)
  );
 
 
  $gestor->EXE_NON_QUERY("
      INSERT INTO users(usuario, senha)
      VALUES(:usuario_gravar, :passwrd_gravar)
  ",$params);
  $sucesso_newsletter='Cadastro Confirmardo';



    }




    }
} 
?>
<!-- //==================================FIM PHP============================ -->
   


<!-- ==================comeco HTML criar usuario.php============ -->

<!-- //================Inicio do Container 1 Alert Danger-->
<script>
function mostrar_caixa(){
    //alert("Ola teste de caixa de alerta");}
    var resultado = confirm("Confirma o cadastro?");

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
    
        <!-- //////// -->
        <script>
                $('#frase_erro').delay(2000).fadeOut('slow');
        </script>
        <script>
              $('#frase_success').delay(2000).fadeOut('slow');
        </script>
          <!-- //////// -->
    </div>
    <!-- //================Fim do Container 1  Alert Danger-->
    <!-- //================Inicio do Container  2 Botao Confirmar Cadastro e texto Usuario Texto-->
    
  
    
    
    
    
    <div class="container">
    
        <div class="row mt-2 mb-2 text-center">
            <div class="offset-4 col-4">      
                <h2 >Cadastro de Usuário</h2>




    <!-- =======INICIO FORM botao_entrar ================================================ -->      
    <form action="?p=cadastro" method="post">

                <!-- Esta guardando no name="formulario" o value="email" -->     
                <!-- erro de email nao digitado======= -->
                <?php if(!empty($erro)) : ?>
                    <div >
                        <div style="color:red;"><?php echo $erro;?></div>
                    </div>
                <?php endif; ?>
                 
                <div class="form-group">
                        <input type="text"name="text_usuario"class="form-control" placeholder="Usuario" required autofocus>
                    </div>
                    
                    <div class="form-group">
                            <input type="text"name="text_senha"class="form-control" placeholder="Senha" required>
                    </div>

        <div class="text-center">
            <input type="hidden" name="formulario" value="botao_entrar">
            <input  type="submit" onclick="mostrar_caixa()" value="Confirmar Cadastro" class="btn btn-primary" >
        </div>  
    </form>
      <!-- =======FIM FORM botao_entrar ================================================ -->      
           
            </div>
        </div>
    </div>
   
<!-- //================Fim do Container 2 -->
<!-- ==================FIM HTML criar usuario.php============ -->