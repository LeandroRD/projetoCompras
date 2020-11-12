
 
var confirma = "nao"; // variavel que determina  sim ou nao no testeonsubimit()
var confirma2 = "nao";
var confirma5 = "nao";
var testevars2 = "";
//parte do bota confirma = sim
var testediv="<div class='bord1' ><h6 class='ip_cad' class=' bord1_h6'>Confirmar o Cadastro?</h6><div class='bord1_2'>SIM</div></div>"

//parte do bota confirma = não
var testediv2="<div class='bord2' ></br><div  class=' bord2_2'>NÃO</div></div>"

//botao senha diferente
var testedivs="<div class='bord1_s' ><h6 class='ip_cad_s' class=' bord1_h6_s'>As Senhas estão diferentes</h6><div class='bord1_2_s'>OK</div></div>"
var sumir=""
var sumir2=""

function testevarrs()
{
    // estara ligando o botao do HTML no paragrafo em branco pelo ID-2
    var testevars = document.getElementById("var_aquis");
    testevars.innerHTML = testedivs;
    // cliquei2() // necessario convocar a funcao para cliquei2-0 
        botao_confirmas()
}

function testevarrs2()
{
    // estara ligando o botao do HTML no paragrafo em branco pelo ID-2
    var testevars2 = document.getElementById("var_aquis2");
    testevars2.innerHTML = testedivs;
    // cliquei2() // necessario convocar a funcao para cliquei2-0 
        botao_confirmas2()
}


function testevarr()
{
    // estara ligando o botao do HTML no paragrafo em branco pelo ID-2
    var testevar = document.getElementById("var_aqui");
    testevar.innerHTML = testediv;
    var testevar2 = document.getElementById("var_aqui2");
    testevar2.innerHTML = testediv2;
    // cliquei2() // necessario convocar a funcao para cliquei2-0 
    botao_confirma()
}


function testevarr2()
{   
    var testevar1 = document.getElementById("var_aqui3");
    testevar1.innerHTML = testediv;
    var testevar3 = document.getElementById("var_aqui4");
    testevar3.innerHTML = testediv2; 
    botao_confirma2()
}


function testevarr5()
{   
    var testevar5 = document.getElementById("var_aqui5");
    testevar5.innerHTML = testediv;
    var testevar5_1 = document.getElementById("var_aqui5_1");
    testevar5_1.innerHTML = testediv2;    
    botao_confirma5()
}



function testeonsubimit()
{      
    testevarr()//estara invocando o botao HTML - 1.1
    if ( confirma == "nao"){
        return false
    }else{
        return true
    }
}

function botao_confirmas()
{
    var botaos = document.getElementById("var_aquis");
    botaos.addEventListener('click', function()
    {
        botaos_sumir()
    })
}

function botao_confirmas2()
{
    var botaos2 = document.getElementById("var_aquis2");
    botaos2.addEventListener('click', function()
    {
        botaos_sumir2()
    })
}

function botaos_sumir2()
{
    var testevarsumir2 = document.getElementById("var_aquis2");
    testevarsumir2.innerHTML = sumir2;
}

function botaos_sumir()
{
    var testevarsumir = document.getElementById("var_aquis");
    testevarsumir.innerHTML = sumir;
}

function botao_confirma()
{
    var botao2 = document.getElementById("var_aqui2");
    var botao = document.getElementById("var_aqui");
    var title = document.getElementById("formulario")[3];

    botao2.addEventListener('click', function()
    {
        window.location.replace("index.php");
    })

    botao.addEventListener('click', function()
    {
        confirma = "sim";
        title.click();
    })
}

function botao_confirma2()

{
    var botao3 = document.getElementById("var_aqui3");
    var botao4 = document.getElementById("var_aqui4");
    var title2 = document.getElementById("formulario2")[4];

    botao4.addEventListener('click', function()
    {
        window.location.replace("index.php");
    })

    botao3.addEventListener('click', function()
    {
        confirma2 = "sim";
        title2.click();
    })
}


function botao_confirma5()
{
    var botao5 = document.getElementById("var_aqui5");
    var botao5_1 = document.getElementById("var_aqui5_1");
    var title5 = document.getElementById("formulario5")[4];

    botao5_1.addEventListener('click', function()
    {
        window.location.replace("index.php");
    })

    botao5.addEventListener('click', function()
    {
        confirma5 = "sim";
        title5.click();
    })

}



function compara_senha3()
{ 
    
    var var_id_text_usuario =document.getElementById("id_text_usuario").value;
    var var_text_senha =document.getElementById("id_text_senha").value;
    var var_text_confirmarsenha = document.getElementById("id_text_confirmarsenha").value;
 
    if(var_text_senha != var_text_confirmarsenha){
        testevarrs();
    return false;
    
    }else{ 
        testevarr2();
        if ( confirma2 == "nao"){
            return false
        }else{
            return true
        }
       
    } 

    } 
    
    
    function compara_senha5()
{ 
    var var_id_text_usuario =document.getElementById("id_text_usuario5").value;
    var var_text_senha =document.getElementById("id_text_senha5").value;
    var var_text_confirmarsenha = document.getElementById("id_text_confirmarsenha5").value;
 
    if(var_text_senha != var_text_confirmarsenha){
        testevarrs2();
    return false;
    
    }else{
        testevarr5();
        if ( confirma5 == "nao"){
            return false
        }else{
            return true
        }
       
    } 
}
  

 function verSenha(){
    let elemento = document.getElementById("id_text_confirmarsenha");
    let elemento2 = document.getElementById("id_text_senha");
    
    if (elemento.type == "text"){
        ver_senha.innerText = "Ver Senha";
        elemento.type ="password";
    }else{
        ver_senha.innerText = "Esconder Senha";
        elemento.type = "text";
    }
    
    if (elemento2.type == "text"){
        ver_senha.innerText = "Ver Senha";
        elemento2.type ="password";
    }else{
        ver_senha.innerText = "Esconder Senha";
        elemento2.type = "text";
    }
    }

    function verSenha2(){
        let elemento = document.getElementById("id_text_confirmarsenha5");
        let elemento2 = document.getElementById("id_text_senha5");
        
        if (elemento.type == "text"){
            ver_senha.innerText = "Ver Senha";
            elemento.type ="password";
        }else{
            ver_senha.innerText = "Esconder Senha";
            elemento.type = "text";
        }
        
        if (elemento2.type == "text"){
            ver_senha.innerText = "Ver Senha";
            elemento2.type ="password";
        }else{
            ver_senha.innerText = "Esconder Senha";
            elemento2.type = "text";
        }
        }

