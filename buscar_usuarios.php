

<?php
include'gestor.php';

//Instanciar a variavel $gestor na classe gestor.php
$gestor = new gestor();

//buscar os dados dos usuarios registrados
$usuarios = $gestor->
EXE_QUERY("
SELECT * FROM users
");
?>




<!-- <table  class="table" > -->
<div class="container-fluid mt-1 teste-menu1 " >


    <table  id="tabela" class="table tabela-resp1" >
    
    <!-- cabecalho------------>
    <thead class=" thead-dark" > 
    <!-- linha do cabecalho -->
        <tr> 
            <th>Id_usuario</th>
            <th>Usuarios</th>
            <th>Criado em:</th>
            <th>Editar</th>
            <th>Deletar</th>
            
            
            
        </tr>
    </thead>
 
 <!----- Inicio da planilha 'Usuarios' -->
    <tbody>
        <!-- É criado a variavel $usuario e  Cada Ciclo a variavel $usuario é  $usuarios    --> 
        <?php foreach($usuarios as $usuario): ?>    
            <tr>
                <td><?php echo $usuario['id_user'] ?></td>
                <td><?php echo $usuario['usuario'] ?></td>
                <td><?php echo $usuario['created_at'] ?></td>
                
                
                
                <td>
                    
                <form action="?p=editar_usuario" method="post">    
                 <!-- <div class="form-group text-center"> -->
                      <!-- Para submeter dados desse form -->
                      <input type="hidden" name="buscar_usuario" value=<?php echo $usuario['id_user'] ?>>
                     <input type="submit" value="Editar"class="btn btn-secondary btn-sm">
                <!-- </div> -->
                </form>
                </td>
                <td>
                <form action="?p=deletar_usuario" method="post">    
                 <!-- <div class="form-group text-center"> -->
                      <!-- Para submeter dados desse form -->
                      <input type="hidden" name="deletar_usuario" value=<?php echo $usuario['id_user'] ?>>
                     <input type="submit" value="Deletar"class="btn btn-secondary btn-sm">
                <!-- </div> -->
                </form>
                    <!-- <a href="editar_usuario.php?id=<?//php echo $usuario['id_user'] ?>">Editar</a> -->
                    <!-- <a href="?p=editar_usuario">Editar</a> -->
                    <!-- <a href="?p=editar_usuario">Editar</a> -->
                    <!-- &nbsp;
                    |
                    &nbsp;
                    <a href="eliminar_confirmar.php?id=<?php echo $usuario['id_user'] ?>">Eliminar</a>
                    &nbsp; -->
                </td>
            
            </tr>
            <?php endforeach; ?>      
    </tbody>
    <!-- Fim da planilha 'Usuarios'--------->

    </table>


    </div>






