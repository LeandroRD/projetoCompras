 <!-- PHP COMECO ========================================================== -->
<?php 
   
    $erro_newsletter='';
    $sucesso_newsletter='';
//validacao do formulario

////Se houver uma submissao
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        //=============================================================
        //Açao se  input type 'formulario' for  value="email" 
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
                        /////comeco
                       // Header('Location: index.php');
                        
                        include('enviar_email.php');
                        echo'ok';
                        // include('contatos.php');
                        // session_destroy();
                        
                        
                        // header('Location: index.php');
                        // header('Location: http://www.google.com.br');
                        // die();
                       
                       
                        
                        // if($_POST['formulario']=='teste'){
                        //     die('login com sucesso');
                        // }
                    
                    }  
                    // die();
                    
                }
                
    //=============================================================
    //Açao se  input type 'formulario' for  value="newsletter" 
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
    //=============================================================
   
    // if($_POST['formulario']=='teste22'){
        
    //     die('    teste die');
    // }

    }  
    // ==========================PHP FIM==================================== 
   
    

     
    ?>

  


    
    
    <!--o ====================== HTML comeco==================================== -->
    <div class="container">
        <div class="row">
            <div class="offset-3 col-6 text-center">

           

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
    
    <div class="container">
    
        <div class="row mt-2 mb-2">
            <div class="offset-3 col-6">      
                <h1>Contatos</h1>
                <form action="?p=contatos" method="post">   
                <!-- Esta guardando no name="formulario" o value="email" -->     
                    <input type="hidden" name="formulario" value="email">   
                     <!-- erro de email nao digitado======= -->
                    <?php if(!empty($erro)) : ?>
                    <div >
                    <div style="color:red;"><?php echo $erro;?></div>
                       
                    </div>
                    <?php endif; ?>
                   <!-- ======================================================= -->
                    <div class="form-group">
                        <input type="email"name="text_email"class="form-control" placeholder="Email"require>
                    </div>
                    
                    <div class="form-group">
                            <input type="text"name="text_assunto"class="form-control" placeholder="Assunto"required>
                    </div>

                    <div class="form-group">
                            <textarea name="text_mensagem"  cols="60" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="text-center">
                            
                             
                            <input type="submit" value="Enviar mensagem" class="btn btn-primary"> 
                            
                        </div>
            
        </form>
        <!-- //======================================================= -->
        <form action="?p=contatos" method="post" >
 
                <div class="text-center">
                         <!-- <input type="hidden" name="formulario" value="teste22">
                        <input type="submit" value="agora" class="btn btn-primary" > -->
                    </div>  
                </form>
        <!-- //======================================================= -->
      
        <div class="row"style="margin-bottom: 150px">
            <div class="offset-0 col-12">
            
            <h2>Newsletter</h2>
            <form action="?p=contatos" method="post" >
                    <!-- Esta guardando no name="formulario" o value="newsletter" -->
                    <input type="hidden" name="formulario" value="newsletter"> 
                    
                    <div class="form-group">
                        <input type="email" name="text_email"class="form-control" placeholder="Email" required>
                    </div>  
                    <div class="text-center">
                        <!-- /////////////////////// -->
                        <input type="submit" value="Receber newsletter" class="btn btn-primary" >
                    </div>
                    
                    
                </form>
            </div>
        </div>   
    </div>
    










   

    
             

    <!-- HTML fim ============================================================== --> 
   

