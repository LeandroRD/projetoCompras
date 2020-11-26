<?php

$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

if($id==false){
    header("Location: index.php");
    die(' fim');
}
//variavel pega o numero do id_usuario
$id = $_GET['id'];



//incluir o sistema de gestao
include'gestor.php';
$gestor = new gestor();//Instanciar a variavel $gestor na classe gestor.php

//buscar os dados dos usuarios registrados
$params=array(//Tecnica de seguranca 
    ':id_usuario2'=> $id
);
$usuario = $gestor->EXE_QUERY("SELECT * FROM users WHERE id_user = :id_usuario2",$params);

?>

<h3>Usuario Selecionados :   <strong><?php echo $usuario[0]['usuario'] ?></strong></h3>
<div>                                    <!-- codigo para ligar o a href  ao id usando php -->
    <a href="index.php">Não</a> &nbsp;|&nbsp; <a href="eliminar_registro.php?id=<?php echo $id  ?>">Sim</a>
</div>