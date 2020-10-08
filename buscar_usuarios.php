
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
  
<div class="container-fluid teste-menu1   pos_absol_margtopo minimo-buscar_tabela" style="margin-top: 130px;padding-bottom: 40px;" >
<div class="minimo_tabela">   
<table  id="tabela" class="table " style="position: relative; "
      >
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
                      <input type="hidden" name="buscar_usuario" value=<?php echo $usuario['id_user'] ?>>
                     <input type="submit" value="Editar"class="btn btn-secondary btn-sm">    
                </form>
                </td>
                <td>
                <form action="?p=deletar_usuario" method="post">    
                      <input type="hidden" name="deletar_usuario" value=<?php echo $usuario['id_user'] ?>>
                     <input type="submit" value="Deletar"class="btn btn-secondary btn-sm">    
                </form>  
                    <!-- <?php echo $usuario['id_user'] ?>   -->
                </td>
            </tr>
            <?php endforeach; ?>      
    </tbody>
    <!-- Fim da planilha 'Usuarios'--------->
    </table>
    </div> 
</div>






