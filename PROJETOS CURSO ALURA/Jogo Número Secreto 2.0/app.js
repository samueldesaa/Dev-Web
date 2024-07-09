// let titulo = document.querySelector('h1');
// titulo.innerHTML = 'Jogo do Número Secreto';

// let paragrafo = document.querySelector('p');
// paragrafo.innerHTML = 'Escolha um número de 1 a 10';

function numAleatorio() {
    return parseInt(Math.random() * 10 + 1);
}
// function numAleatorio(num) {
//     return parseInt(Math.random() * num + 1);
// }

let numSecreto = numAleatorio();
// console.log(`Este é o número Secreto:${numSecreto}`);
let tentativas = 1;

function exibirTextoNaTela(tag, texto) {
    let campo = document.querySelector(tag);
    campo.innerHTML = texto;
}

function exibirTextoInicial() {
    exibirTextoNaTela('h1', 'Jogo do Número Secreto');
    exibirTextoNaTela('p', 'Escolha um número de 1 a 10');
}

exibirTextoInicial();

function verificarChute() {
    let chute = document.querySelector('input').value;
    if (chute == numSecreto) {
        exibirTextoNaTela('h1', "Acertou!");
        exibirTextoNaTela('p', `Você descobriu o número secreto ${numSecreto} em ${tentativas} ${tentativas == 1 ? 'tentativa' : 'tentativas'}!`);
        document.getElementById('reiniciar').removeAttribute('disabled');
    } else {
        if (chute > numSecreto) {
            exibirTextoNaTela('p', `O número é menor que ${chute}`);
        } else {
            exibirTextoNaTela('p', `O número é maior que ${chute}`);
        }
        tentativas++;
    }
}

function limparCampo() {
    document.querySelector('input').value = '';
}

function reiniciarJogo() {
    numSecreto = numAleatorio();
    tentativas = 1;
    limparCampo();
    exibirTextoInicial();
    document.getElementById('reiniciar').setAttribute('disabled', true);
}
