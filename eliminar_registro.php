
<?php 

$id = $_GET['id'];
    //Eliminar o registro
    include'gestor.php';
    //Instanciar a variavel $gestor na classe gestor.php
    $gestor = new gestor();

    //Tecnica de seguranca 
    $params=array(
        ':id_usuario2'=> $id
    );

    //buscar os dados dos usuarios registrados
    $gestor->EXE_NON_QUERY("DELETE  FROM users WHERE id_user = :id_usuario2",$params);

    //redirecionar para a pgaina inicial
    header("Location: index.php");
   

?>