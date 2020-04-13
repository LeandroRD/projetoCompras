<?php 
include 'gestor.php';

$gestor = new gestor();

$usuario = "leandro";
$senha ="abc123";

$params = array(
    ':usuario'=> $usuario,
    ':senha'=> password_hash($senha, PASSWORD_DEFAULT)
);

$gestor->EXE_NON_QUERY(
    "INSERT INTO users VALUES(0,:usuario, :senha)"
    ,$params);
    echo'terminado';


?>
<div class="container">
    <div class="row mt-5">
        <div class="offset-3 col-6">        
        <form action="?p=area_reservada" method="post">
            <input type="text" name="text_usuario" placeholder="Criar Usuario"><br>
            <input type="password" name="text_senha"placeholder="Password"><br>
            <input type="submit" value="Entrar">
        </form>       
        </div>
    </div>
</div>
