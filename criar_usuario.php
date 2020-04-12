<?php 
include 'gestor.php';

$gestor = new gestor();

$usuario = "joao";
$senha ="aaabbb";

$params = array(
    ':usuario'=> $usuario,
    ':senha'=> password_hash($senha, PASSWORD_DEFAULT)
);

$gestor->EXE_NON_QUERY(
    "INSERT INTO users VALUES(0,:usuario, :senha)"
    ,$params);
    echo'terminado';



