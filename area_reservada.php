<!-- =========INICIO AREA_RESERVADA.PHP============================================ -->
<!-- Se existe uma session com o User-->
 

<br><br><br><br><br><br> <br>    <br>
<div class="container  posicao_relativa tamanho topo_reservado">
    <div>
    <?php if($erro): ?>
                 <div class="alert alert-danger objeto-apagado text-center login_invalido" id="frase_erro">
                     Login Inválido
                 </div>
                 <?php endif; ?>
        <div class="area_reservada pos_absol " >
              <h2>Área Reservada</h2>


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
                      <input type="submit" value="Entrar"class="btn btn-outline-info botao_reservado">
                 </div>
                 <!-- 4a acao Se o $erro for verdadeiro -->
                 
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


   


