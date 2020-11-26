<?php

include 'gestor.php';

$gestor = new gestor();
$dados = $gestor->exe_query("SELECT * FROM emails");



echo'<pre>';
var_dump($dados);
echo'<br>';
print_r($dados);
echo'<br>';
echo $dados[2]['email'];
die('TERMINADO!');