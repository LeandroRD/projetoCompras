<?php 

include 'gestor.php';
$gestor = new gestor();

if($_SERVER['REQUEST_METHOD'] == 'POST' ){

    if($_POST['formulario']=='botao_entrar'){
        echo 'Confirmado o cadastro';


        $usuario = $_POST['text_usuario'];
        $senha = $_POST['text_senha'];

$params = array(
    ':usuario'=> $usuario,
    ':senha'=> password_hash($senha, PASSWORD_DEFAULT)
);

$gestor->EXE_NON_QUERY(
    "INSERT INTO users VALUES(0,:usuario, :senha)"
    ,$params);
    
  
    }
    } 

    ?>

<!-- //=============================começo HTML================ -->


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
                <h1>Cadastro de Usuário</h1>
                <form action="?p=cadastro" method="post">   
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
                        <input type="text"name="text_usuario"class="form-control" placeholder="Usuario"required>
                    </div>
                    
                    <div class="form-group">
                            <input type="text"name="text_senha"class="form-control" placeholder="Senha"required>
                    </div>

                   
    <form action="?p=cadastro" method="post" >
        <div class="text-center">
            <input type="hidden" name="formulario" value="botao_entrar">
            <input type="submit" value="Confirmar Cadastro" class="btn btn-primary" >
        </div>  
    </form>
      
           
    </div>
    </div>
    </div>


