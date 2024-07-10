function calculaIMC() {
    let inputs = document.getElementById("imc").getElementsByTagName('input');
    // console.log(inputs[0].value);
    // console.log(inputs[1].value);
    let imc = (inputs[1].value / Math.pow(inputs[0].value, 2)).toFixed(2);
    alert(`Seu IMC é = ${imc}`);
    if (imc < 16.9) {
        alert("Muito abaixo do peso");
    } else if (imc >= 17 && imc <= 18.4) {
        alert("Abaixo do peso");
    } else if (imc >= 18.5 && imc <= 24.9) {
        alert("Peso normal");
    } else if (imc >= 25 && imc <= 29.9) {
        alert("Acima do peso");
    } else if (imc >= 30 && imc <= 34.9) {
        alert("Obesidade grau I");
    } else if (imc >= 35 && imc <= 40) {
        alert("Obesidade grau II");
    } else if (imc > 40) {
        alert("Obesidade grau III");
    } else {
        alert("IMC inválido");
    }
}

function fatorial() {
    let input = document.getElementById("fatorial").getElementsByTagName("input");
    let fat = (input[0].value);
    for (let i = fat - 1; i > 0; i--) {
        fat *= i;
    }
    alert(fat);
}

function converter() {
    let input = document.getElementById("conversor").getElementsByTagName("input");
    let dol = (input[0].value);
    alert(`Vale ${dol * 4.8} reais`);
}

function retangular() {
    let input = document.getElementById("salaRet").getElementsByTagName("input");
    let alt = (input[0].value);
    let larg = (input[1].value);
    alert(`A sala retangular possui\nÁrea: ${alt * larg}\nPerímetro: ${alt * 2 + larg * 2}`);
}
function circular() {
    let input = document.getElementById("salaCirc").getElementsByTagName("input");
    let raio = (input[0].value);
    alert(`A sala circular possui\nÁrea: ${(Math.PI * Math.pow(raio, 2)).toFixed(2)}\nPerímetro: ${(2 * Math.PI * raio).toFixed(2)}`);
}
function tabuada() {
    let input = document.getElementById("tabuada").getElementsByTagName("input");
    let num = (input[0].value);
    let tab = `Tabuada de ${num}: `;
    for (let i = 10; i > 0; i--) {
        tab += `\n${num} * ${i} = ${num*i}`;
    }
    alert(tab);
}