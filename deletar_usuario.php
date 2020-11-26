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
    var resultado = confirm("Confirma a Exclusão");

    if (resultado ==false){
    

      document.write ();
     window.location.replace("index.php?p=buscar_usuarios");
    }
    }
    </script>

<div class="container minimo_input2 tamanho2 "style="margin-top: 160px;">
        <div class="row   " style="text-align: center;">
                    <div class="col-sm-12  " >
                        <h4 >  Deletar Usuário   :  </h4>
                    
                    
                        <h5 class="color-red"><?php echo $usuario[0]['usuario'] ?> </h5>
                   
    <form action="?p=deletar_final" method="post" >
        <?php if(!empty($erro)) : ?>
                    <div >
                        <div style="color:red;"><?php echo $erro;?></div>
                    </div>
                <?php endif; ?>                
                <!-- <div class="form-group">
                       <?php echo $usuario[0]['usuario'] ?>
                    </div> -->
        <div >
            <input type="hidden" name="id_usuario" value="<?php echo $editar ?>">
            <!-- vai sair esse hidden -->
            <input  type="submit" onclick="mostrar_caixa()" value="Confirmar Eliminação  " class="btn btn-primary" >
            <p><br><a href="index.php?p=buscar_usuarios">Voltar</a></p> 
        </div>        
    </form> 
    </div>   
      <!-- =======FIM FORM botao_entrar ================================================ -->               
            
        
    </div>
    
    </div>

