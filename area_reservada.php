<!-- Se existe uma session com o User-->
<?php if (isset($_SESSION['user'])):?>
  
    <h1>Área Reservada</h1>

   

<?php else:?>

<div class="container">
    <div class="row mt-5">
        <div class="offset-4 col-4">        
        <form action="?p=area_reservada" method="post">
            <div class="form-group">
                <input type="text" name="text_usuario" placeholder="Usuario" class="form-control">
            </div>    
            <div class="for-group">
                <input type="password" name="text_senha"placeholder="Password"class="form-control">
            </div><br>

            <div class="form-group text-center">
                 <input type="submit" value="Entrar"class="btn btn-outline-info">
            </div>
            
            <?php if($erro): ?>
            <div class="alert alert-primary text-center" id="erro">
                 Login Inválido
            </div>
            <?php endif; ?>
          <!-- ////////////////////// Código JQUERY -->
          <script>
                $('#erro').delay(2000).fadeOut('slow');
          </script>
        
        </form>       
        </div>
    </div>
</div>



   

<?php endif;?>
