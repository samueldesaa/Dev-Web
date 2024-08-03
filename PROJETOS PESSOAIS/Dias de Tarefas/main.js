const dataEspecifica = new Date("2023-07-30");
const dataAtual = new Date();
const diferencaEmMilissegundos = dataAtual - dataEspecifica;
const milissegundosPorDia = 24 * 60 * 60 * 1000;
const diferencaEmDias = Math.floor(diferencaEmMilissegundos / milissegundosPorDia);

let agua = diferencaEmDias%2 == 0 ? "SIM" : "NÃO";
let aguaP = document.getElementById('agua');
aguaP.innerText = agua;
if(agua != "SIM"){
    aguaP.style.backgroundImage = "linear-gradient(to top, transparent, red)";
}else{
    aguaP.style.backgroundImage = "linear-gradient(to bottom, transparent, #57b8a1)";
}
aguaP.style.backgroundClip = "text"
aguaP.style.color = "transparent"

function diaDeLixo(data) {
    const diaDaSemana = data.getDay();
    return diaDaSemana === 1 || diaDaSemana === 3 || diaDaSemana === 5;
}

const dataParaVerificar = new Date();

const lixo = diaDeLixo(dataParaVerificar) ? "SIM" : "NÃO";

let lixoP = document.getElementById('lixo');

lixoP.innerText = lixo;

if(lixo != "SIM"){
    lixoP.style.backgroundImage = "linear-gradient(to top, transparent, red)";
}else{
    lixoP.style.backgroundImage = "linear-gradient(to bottom, transparent, #57b8a1)";
}
lixoP.style.backgroundClip = "text"
lixoP.style.color = "transparent"
