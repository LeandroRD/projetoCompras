<!-- =========INICIO AREA_RESERVADA.PHP============================================ -->
<!-- Se existe uma session com o User-->
 
  
    <h1>Área Reservada</h1>

   



<div class="container">
    <div class="row mt-5">
        <div class="offset-4 col-4">
            <!--------Inicio do Form  a 1a Acao é mandar para o index -> p= area_reservada---------------------------->
        <form action="?p=area_reservada" method="post">
            <div class="form-group">
                <!-- Ira Enviar dados da text_usuario -->
                <input type="text" name="text_usuario" placeholder="Usuario" class="form-control" autofocus>
            </div>    
            <div class="for-group">
                <!-- Ira Enviar dados da text_senha -->
                <input type="password" name="text_senha"placeholder="Password"class="form-control">
            </div><br>

            <div class="form-group text-center">
                <!-- Para submeter dados desse form -->
                 <input type="submit" value="Entrar"class="btn btn-outline-info">
            </div>
            <!-- 4a acao Se o $erro for verdadeiro -->
            <?php if($erro): ?>
            <div class="alert alert-primary text-center" id="frase_erro">
                 Login Inválido
            </div>
            
            <?php endif; ?>
          <!-- // Código JQUERY ligada frase_erro para sumir o alerta apos 2 segundos -->
          <script>
                $('#frase_erro').delay(2000).fadeOut('slow');
          </script>
        </form>
        <!----------------------- Fim do Form------------->
        </div>
    </div>
</div>
<!-- =========INICIO AREA_RESERVADA.PHP================================================= -->


   

