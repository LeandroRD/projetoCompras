
<?php
    if(!isset($_SESSION['user'])){
        return;
    }
?>




<div id="user1" class="bg-dark text-white text-right p-2 posicao_relativa minim-op11  barra_user" >
    <?php echo $_SESSION['user'] ?>   | <a href="?p=logout">logout</a>   
</div>