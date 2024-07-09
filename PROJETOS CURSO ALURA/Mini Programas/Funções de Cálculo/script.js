function calculaIMC(){
    let inputs = document.getElementById("imc").getElementsByTagName('input');
    // console.log(inputs[0].value);
    // console.log(inputs[1].value);
    alert(`IMC = ${(inputs[1].value/Math.pow(inputs[0].value,2)).toFixed(2)}`);
}

function fatorial(){
    let input = document.getElementById("fatorial").getElementsByTagName("input");
    alert(`${(input[0].value)}`);
}