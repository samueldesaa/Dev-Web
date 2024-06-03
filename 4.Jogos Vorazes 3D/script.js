var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var btn3 = document.getElementById("btn3");
var btn4 = document.getElementById("btn4");
var btn5 = document.getElementById("btn5");
var btn6 = document.getElementById("btn6");
var book = document.getElementById("livro");

btn1.onclick = function () {
    book.style.animation = "spinR 6s ease-in-out";
}

btn2.onclick = function () {
    book.style.animation = "spinL 6s ease-in-out";
}
btn3.onclick = function () {
    book.style.animation = "spinU 6s ease-in-out";
}
btn4.onclick = function () {
    book.style.animation = "spinD 6s ease-in-out";
}
btn5.onclick = function () {
    book.style.animation = "spinC 10s ease-in-out infinite";
}
btn6.onclick = function () {
    book.style.animation = "";
}