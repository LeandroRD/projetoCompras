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
        ':usuario'=>$usuario
    );
    $resultado = $gestor->EXE_QUERY("
    SELECT 
        usuario 
    FROM users
    WHERE
        usuario = :usuario
        AND
            id_user <> :id_usuario 
    ",$params);
    
    // se ja existir apresentar a mensagem de erro
    if(count($resultado) !=0){
        echo 'ja existe outro usuario com o mesmo nome';
        echo '<p><a href="index.php">Voltar</a> </P>';
        exit();
    }
        
    //se nao existe, atualizando os dados no usuario selecionad
    $gestor->EXE_NON_QUERY("
    UPDATE users
        SET
            usuario = :usuario,
            updated_at = NOW()
        WHERE 
            id_user = :id_usuario
    ", $params);
    
    header("Location: index.php?p=buscar_usuarios");


   