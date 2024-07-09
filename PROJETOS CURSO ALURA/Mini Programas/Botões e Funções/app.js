let titulo = document.querySelector('h1');
titulo.innerHTML = "Hora do Desafio";

function clicado(){
    console.log("O botão foi clicado");
}

function amoJs(){
    alert("Eu amo JS");
}

function cidade(){
    let cidade = prompt("Me diga uma cidade:");
    alert(`Estive em ${cidade} e lembrei de você`)
}

function soma(){
    let n1 = parseInt(prompt("Informe o primeiro número da soma:"));
    let n2 = parseInt(prompt("Informe o segundo número da soma:"));
    alert(`O resultado é ${n1+n2}`);
}