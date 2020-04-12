<?php
//
//iniciando session
session_start();
//incluindo 
 include('layout/html_header.php');
 include('layout/nav.php');
 include('layout/user.php');


 //Rotas (routes) - roteamento - caso a query string estiver fazia
 $pag='inicio';

if (isset($_GET['p'])){

      // ira buscar o 'p'
      $pag = $_GET['p'];    
}


 switch ($pag) {


      //logout
      case 'logout':
            session_destroy();

            //instrucao para a barra de login desapareca
            Header('Location: '.$_SERVER['PHP_SELF']);
           
            return;
            break;

    case 'inicio':
      include('inicio.php');
       break;

    case 'empresa':
      include('empresa.php');
       break;

    case 'servicos':
         include('servicos.php');
          break;

    case 'contatos':
         include('contatos.php');
          break;

    case 'area_reservada':
     //verifica se houve submissao de formulario
         $erro=false;
         if($_SERVER['REQUEST_METHOD']=='POST'){
            //Ira retornar a barra layout
            if(verificarLogin()){
                  include('layout/user.php');
            }else{
                  //erro, login invalido
                  $erro=true;

            }
         }
         include('area_reservada.php');
         break;

    default:
        include('inicio.php');
       break;
 }



 
 include('layout/footer.php');
 include('layout/html_footer.php');

function verificarLogin(){
      
   /*
buscar os dados do user a base de dados
      -se user nao existe = login invalido
      -se user existe
            -verificar se a senha é valida
                  -sim = criar sessao
                  -nao = login invalido
   */
$usuario = trim($_POST['text_usuario']);
$senha = trim($_POST['text_senha']);

include 'gestor.php';
$gestor= new Gestor();
$params = array(
      ':usuario'=>$usuario
);
$resultado = $gestor->EXE_QUERY("
      SELECT * FROM users 
      WHERE usuario =:usuario
",$params);


if(count($resultado)==0){
      // login invalido - usuario nao existe no BD
      return false;
}else{
      //usuario existe
      
      $senha_bd = $resultado[0]['senha'];
      
      //verificar password
      if(password_verify($senha, $senha_bd)){
            //senha valida
            $_SESSION['user']=$resultado[0]['usuario'];
          
            return true;
            
      }else{
            //senha invalida
            
            return false;
      }
           
      }     
}

