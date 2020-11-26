



<?php 
   
    $erro_newsletter='';
    $sucesso_newsletter='';
//validacao do formulario
//=============================================================
////Se houver uma submissao
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    //Açao se  input type 'formulario' for  value="newsletter" (botao receber newsletter)
    if($_POST['formulario']=='newsletter'){
            $email=$_POST['text_email'];
            
            include 'gestor.php';
            $gestor = new gestor();
    //-----------------------------------------------------------------        
            // instrucoes de seguranca bloquear Query mal intencionado pela input type
            $params=array(
                ':seguranca'=>$email
            );
    //-----------------------------------------------------------------
            //verificar se ja existe e-mail na base de dados
            $resultado = $gestor->EXE_QUERY("SELECT email FROM emails WHERE email = :seguranca",$params);
            if(count($resultado)!=0){
                //email ja esta registrado
                $erro_newsletter="O e-mail ja esta registrado";
            }
            else{
                //email novo
            //inserir novo email na base de dados
            $gestor->EXE_NON_QUERY('INSERT INTO emails(email) VALUES(:seguranca)',$params);
            $sucesso_newsletter='Obrigado por ter registrado o seu e-mail';    
        }
    } 
    

    }?>
<div class="container " style="margin-top: 150px;">
        <div class="row">
            <div class="offset-3 col-6 text-center">
                <?php if(!empty($erro_newsletter)) : ?>
                    <div class="alert alert-danger  objeto-apagado " >
                        <?php echo $erro_newsletter?>

                    </div>
                <?php endif;?>

                <?php if(!empty($sucesso_newsletter)): ?>
                <div class="alert alert-success objeto-apagado">
                <?php echo $sucesso_newsletter?>
                 </div>
                <?php endif;?>
            </div>
        </div>
      

        
    </div >


<br><br><br><br>
<div class="container teste-menu1 tamanho topo_contatos">
    <div class="row mt-3"  >
        <div class=" col-12"> 
             <div class="row"style="margin-bottom: 70px">
            <div class="offset-0 col-12">    
            <h3>Cadastro de e-mail.</h3>
                    <form action="?p=contatos_email" method="post" >
                    <!-- Esta guardando no name="formulario" o value="newsletter" -->
                    <input type="hidden" name="formulario" value="newsletter"> 
                        <div class="form-group">
                            <input size="10" type="email" name="text_email"class="form-control" placeholder="Email" required>
                        </div>  
                         <!-- <div class="text-center"> -->
                        <input  type="submit" value="Confirmar Cadastro" class="botao_email btn btn-primary margin-left: 100px" >
                
                        <!-- </div> -->
                    <div class="topo-nav" style="padding-bottom: 80px;">
                        <a href="?p=contatos" style="position: absolute; margin-top: 50px;margin-left:0px"  >enviar e-mail</a>
                    </div>   
                  </form>
               </div>
             </div>   
            </div>
        </div>
    </div>
    