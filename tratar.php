<?php
//verificar se os campos existem
    if (!isset($_POST['text_usuario'])|| !isset($_POST['text_senha'])){
        die('Erro, nao existem os campos necessarios!!');
    }

    //verificar  se todos os campos estao preenchidos
    if(empty($_POST['text_usuario']) ){
        die('Erro, nao foi preenchido o campo usuario!!');
    }

    if( empty($_POST['text_senha'] )){
        die('Erro, nao foi preenchido o campo senha!!');
    }

    $usuario = $_POST['text_usuario'];
    $senha = $_POST['text_senha'];

    ////////Verifica se o usuario tem  entre 5 a 10 caracteres
    if(strlen($usuario) < 3 || strlen($usuario) > 10 ){
        die('Erro - Usuario tem que ter entre 3 a 10 caracteres!!');  
        }

    if(strlen($usuario) < 3 || strlen($usuario) > 16 ){
        die('Erro - Usuario tem que ter entre 3 a 16 caracteres!!');  
        }

    ///////Verifica se o usuario e respectiva senha existem
    
    if($usuario == $u && $senha == $s){
        die('login com sucesso');
    }else{
        die('Login invalido');
    }





