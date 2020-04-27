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
<div class="container">
        <div class="row">
            <div class="offset-3 col-6 text-center">
                <?php if(!empty($erro_newsletter)) : ?>
                    <div class="alert alert-danger "id="frase_erro">
                        <?php echo $erro_newsletter?>
                    </div>
                <?php endif;?>

                <?php if(!empty($sucesso_newsletter)): ?>
                <div class="alert alert-success"id="frase_success">
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



<div class="container">
    <div class="row mt-3">
        <div class="offset-4 col-4"> 
             <div class="row"style="margin-bottom: 150px">
            <div class="offset-0 col-12">    
            <h2>Newsletter</h2>
                    <form action="?p=contatos_email" method="post" >
                    <!-- Esta guardando no name="formulario" o value="newsletter" -->
                    <input type="hidden" name="formulario" value="newsletter"> 
                        <div class="form-group">
                            <input type="email" name="text_email"class="form-control" placeholder="Email" required>
                        </div>  
                         <div class="text-center">
                        <input type="submit" value="Receber newsletter" class="btn btn-primary" >
                    </div>   
                  </form>
               </div>
             </div>   
            </div>
        </div>
    </div>
    