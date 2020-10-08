 <!-- PHP COMECO ========================================================== -->
<?php 
   
    $erro_newsletter='';
    $sucesso_newsletter='';
//validacao do formulario

////Se houver uma submissao
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        //=============================================================
        //Açao se  input type 'formulario' for  value="email" (botao enviar mensagem)
        if($_POST['formulario']=="email"){
            $erro='';

            ///////verifica se existem todos os campos

                    if(!isset($_POST['text_email'])||
                    !isset($_POST['text_assunto'])||
                    !isset($_POST['text_mensagem'])){
                        $erro = 'Pelo menos um dos campos nao existe';
                    }
    //-----------------------------------------------------------------  
                    //ver se os campos foram preenchidos                             
                    if(empty($erro)){
                        $email = $_POST['text_email'];
                        $assunto = $_POST['text_assunto'];
                        $mensagem = $_POST['text_mensagem'];
    //-----------------------------------------------------------------
                        //Mensagem se  InputType do e-mail estiver nulo
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $erro='Endereco de email invalido';

                    }
                }
    //-----------------------------------------------------------------  
                    //envio de email
                    if(empty($erro)){                       
                        include('enviar_email.php');
                        //echo'ok';
                    }     
                }
    }  
    // ==========================PHP FIM==================================== 
    ?>
    <!--o ====================== HTML comeco==================================== -->
    <div class="container " style="margin-top: 150px;position: relative;" >
        <div class="row">
            <div class="offset-3 col-6 text-center ">
                <?php if(!empty($erro_newsletter)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $erro_newsletter?>
                    </div>
                <?php endif;?>

                <?php if(!empty($sucesso_newsletter)): ?>
                <div class="alert alert-success">
                <?php echo $sucesso_newsletter?>
                 </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    
    <div class="container teste-menu1 " >   
        <div class="row mt-5 mb-2 margem_grande " >
<!-- =================Inicio Form email================================================ -->
                <form action="?p=contatos"   method="post" class="minimo_input "style="padding-bottom: 80px;" >
                    <h3 style="width: 170px;margin-left: auto;margin-right: auto;" >
                        Enviar e-mail
                    </h3>   
                <!-- Esta aguardando no name="formulario" o value="email" -->     
                    <input type="hidden" name="formulario" value="email">   
                     <!-- erro de email nao digitado======= -->
                    <?php if(!empty($erro)) : ?>
                    <div >
                    <div style="color:red;"><?php echo $erro;?></div>
                       
                    </div>
                    <?php endif; ?>
                   
                    <div class="form-group">
                        <input type="email"name="text_email"class="form-control" placeholder="Email"required>
                    </div>
                    
                    <div class="form-group">
                        <input type="text"name="text_assunto"class="form-control" placeholder="Assunto"required>
                    </div>

                    <div class="form-group" >
                        <textarea name="text_mensagem"  cols="60" rows="3" class="form-control" required></textarea>
                    </div>
                
                    <div class="text-center">     
                        <input type="submit" value="Enviar mensagem" class="btn btn-primary">        
                    </div>  
                </form>

            
        </div>
    </div>









   

    
             

    <!-- HTML fim ============================================================== --> 
   

