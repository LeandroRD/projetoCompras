

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
<table  id="tabela" class="table" >
    
    <!-- cabecalho -->
    <thead class="thead-dark"> 
    <!-- linha do cabecalho -->
        <tr> 
            <th>Usuario</th>
            <th>Criado em </th>
            <th>Açoes</th>
        </tr>
    </thead>
 
 <!-- Inicio da planilha 'Usuarios' -->
<tbody>
    <!-- É criado a variavel $usuario e  Cada Ciclo a variavel $usuario é  $usuarios    --> 
    <?php foreach($usuarios as $usuario): ?>    
        <tr>
            <td><?php echo $usuario['usuario'] ?></td>
            <td><?php echo $usuario['created_at'] ?></td>
            
            <td>&nbsp;
                <a href="editar_usuario.php?id=<?php echo $usuario['id_usuario'] ?>">Editar</a>
                &nbsp;
                |
                &nbsp;
                <a href="eliminar_confirmar.php?id=<?php echo $usuario['id_usuario'] ?>">Eliminar</a>
                &nbsp;
            </td>
         
        </tr>
        <?php endforeach; ?>
    
</tbody>
<!-- Fim da planilha 'Usuarios' -->


</table>






