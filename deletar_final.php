

<?php
//buscar a informacao do post
$id_usuario= $_POST['id_usuario'];
$usuario = $_POST['text_usuario'];

//abrir a ligacao a bd
include'gestor.php';
$gestor = new gestor();

//verificar se ja existe outro usuario com o mesmo nome
$params =array(
    ':id_usuario'=>$id_usuario,
);


//buscar os dados dos usuarios registrados
$gestor->EXE_NON_QUERY("DELETE  FROM users WHERE id_user = :id_usuario",$params);
header("Location: index.php?p=buscar_usuarios");
//redirecionar para a pgaina inicial


