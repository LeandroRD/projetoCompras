
<?php
    if(!isset($_SESSION['user'])){
        return;
    }
?>




<div class="bg-dark text-white text-right p-2  minim-op " style="position: absolute;width: 100% ;">
    <?php echo $_SESSION['user'] ?>   | <a href="?p=logout">logout</a>   
</div>