alert("Bem-vindo ao jogo Número Secreto!");
alert("Escolha a dificuldade a seguir:")
let numMax = parseInt(prompt("1-Baby Mode | 2-Facil | 3-Médio | 4-Difícil | 5-Super Difícil"));
switch (numMax) {
    case 1:
        numMax = 10;
    break;
    case 2:
        numMax = 100;
    break;
    case 3:
        numMax = 1000;
    break;
    case 4:
        numMax = 5000;
    break;
    case 5:
        numMax = 10000;
    break;
    default:
        numMax = 100;
        alert("Não foi possível entender as condições, vamos a dificuldade padrão");
    break;
}
let numSecreto = parseInt(Math.random() * numMax) + 1;
console.log(numSecreto);
let palpite = prompt(`Escolha um número de 1 a ${numMax}:`);
let tentativas = 1;
while (numSecreto != palpite) {
    if (numSecreto < palpite) {
        palpite = prompt(`O número é menor que ${palpite}, tente novamente:`)
    } else if (numSecreto > palpite) {
        palpite = prompt(`O número é maior que ${palpite}, tente novamente:`)
    } else if (numSecreto > numMax || numSecreto < 1) {
        alert("NÚMERO INVÁLIDO");
    }
    tentativas++;
}
alert(`O número secreto era ${numSecreto}\nVocê acertou em ${tentativas} ${tentativas > 1 ? "tentativas" : "tentativa"}`);