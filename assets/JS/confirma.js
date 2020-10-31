
 
var confirma = "nao"; // variavel que determina  sim ou nao no testeonsubimit()

//parte do bota confirma = sim
var testediv="<div class='bord1' ><h6 class='ip_cad' class=' bord1_h6'>Confirmar o Cadastro?</h6><div class='bord1_2' style=''>SIM</div></div>"
//parte do bota confirma = não



var testediv2="<div class='bord2' ></br><div  class=' bord2_2'>NÃO</div></div>"

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


function testeonsubimit()
{   
   
    testevarr()//estara invocando o botao HTML - 1.1
    if ( confirma == "nao"){
        return false
    }else{
        return true
    }
    // return false

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