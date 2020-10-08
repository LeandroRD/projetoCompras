<?php
//
//iniciando session
session_start();
//incluindo teste 11:08
 include('layout/html_header.php');
 include('layout/nav.php');
//  include('layout/nav.php');
 include('layout/user.php');
//  include('layout/aviso-delete.php');

 //Rotas (routes) - roteamento - caso a query string estiver fazia
 $pag='inicio';
 $rodape=false;

if (isset($_GET['p'])){

      // ira buscar o 'p'
      $pag = $_GET['p'];    
}

 switch ($pag) {

      //logout
     case 'logout':
            session_destroy();
            //instrucao para a barra de login desapareca
            echo'
            <script>
              window.location.replace("index.php?");
            </script>';
            return;
      break;

      case 'inicio':
            include('inicio.php');
      break;

      

      case 'contatos':
            include('contatos.php');
      break;

      case 'contatos_email':
            include('contatos_email.php');
      break;

      case 'cadastro':
            include('criar_usuario.php');             
      break;

      case 'editar_usuario':
            include('editar_usuario.php');            
      break;       
         
      case 'buscar_usuarios':
            include('buscar_usuarios.php'); 
            $rbhodape=true;            
      break;

      case 'deletar_usuario':
            include('deletar_usuario.php'); 
            $rodape=true;            
      break;
         
      case 'editar_final':
            include('editar_final.php'); 
            $rodape=true;            
      break;

      case 'editar_final2':
            include('editar_final2.php'); 
            $rodape=true;            
      break;

      case 'deletar_final':
            include('deletar_final.php'); 
            $rodape=true;            
      break;

      

      case 'area_reservada':
         // ----------2a Acao-------------------- 
         //verifica se houve submissao de formulario
         $erro=false;
         if($_SERVER['REQUEST_METHOD']=='POST'){
            //Ira retornar a barra layout
            if(verificarLogin()){
                  include('layout/user.php');
            }else{
                  //3a acao retorna erro=verdadeiro, login invalido                 
                  $erro=true;
            }
         }
         include('area_reservada.php');
      break;

      default:
        include('inicio.php');
      break;
 }



 if ($rodape ==false){
      include('layout/footer.php');
 }
 
 
 include('layout/html_footer.php');

 function verificarLogin(){
     //criar 2 variaveis (usuario e senha) recebendo os valores submetidos
    $usuario = trim($_POST['text_usuario']);
    $senha = trim($_POST['text_senha']);
    
    //ligar a gestor
    include 'gestor.php';
    $gestor= new Gestor();
 
    //criar array $params de seguranca ligado a variavel usuario que recebeu a submissao
    $params = array(
          ':usuario'=>$usuario
    );
    
    //criar variavel  $resultado ligado ao GESTOR, usando a array $usuario
    $resultado = $gestor->EXE_QUERY("
          SELECT * FROM users 
          WHERE usuario =:usuario
    ",$params);
    
    //se variavel resultado nao achar 
    if(count($resultado)==0){
          // login invalido - usuario nao existe no BD
          return false;
     
    //se variavel resultado achar
    }else{
          
          //criar variavel senha_bd ligado a variavel resultado pegando o campo 'senha'
          $senha_bd = $resultado[0]['senha'];
          
          //verificar password comparando a criptografada com a que foi inserida area_reservada.php
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

    

   


