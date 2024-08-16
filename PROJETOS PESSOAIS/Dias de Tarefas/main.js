const dataEspecifica = new Date("2024-08-02");
const dataAtual = new Date();

// Ajuste para considerar a hora do dia
dataEspecifica.setHours(0, 1, 0, 0);
dataAtual.setHours(0, 0, 0, 0);

console.log(dataEspecifica);
console.log(dataAtual);

const diferencaEmMilissegundos = dataAtual - dataEspecifica;
const milissegundosPorDia = 24 * 60 * 60 * 1000;
const diferencaEmDias = Math.floor(diferencaEmMilissegundos / milissegundosPorDia);
console.log(diferencaEmDias);

let agua = diferencaEmDias % 2 === 0 ? "SIM" : "NÃO";
let aguaP = document.getElementById('agua');
aguaP.innerText = agua;

if (agua !== "SIM") {
    aguaP.style.backgroundImage = "linear-gradient(to top, transparent, red)";
    aguaP.style.backgroundImage = "-webkit-linear-gradient(to top, transparent, red)";
} else {
    aguaP.style.backgroundImage = "linear-gradient(to top, transparent, green)";
    aguaP.style.backgroundImage = "-webkit-linear-gradient(to top, transparent, green)";
}
aguaP.style.backgroundClip = "text";
aguaP.style.color = "transparent";

function diaDeLixo(data) {
    const diaDaSemana = data.getDay();
    return diaDaSemana === 1 || diaDaSemana === 3 || diaDaSemana === 5;
}

// Ajuste para considerar a hora atual
const dataParaVerificar = new Date();
const lixo = diaDeLixo(dataParaVerificar) ? "SIM" : "NÃO";

let lixoP = document.getElementById('lixo');
lixoP.innerText = lixo;

if (lixo !== "SIM") {
    lixoP.style.backgroundImage = "linear-gradient(to top, transparent, red)";
    lixoP.style.backgroundImage = "-webkit-linear-gradient(to top, transparent, red)";
} else {
    lixoP.style.backgroundImage = "linear-gradient(to top, transparent, green)";
    lixoP.style.backgroundImage = "-webkit-linear-gradient(to top, transparent, green)";
}
lixoP.style.backgroundClip = "text";
lixoP.style.color = "transparent";
