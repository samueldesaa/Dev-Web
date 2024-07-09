document.addEventListener("mousemove",color)

function color(e){
    document.body.style.backgroundColor = `rgb(${e%256},${e*2%256},${e*67%256})`;
}
// function color(){
//     document.body.style.backgroundColor = `rgb(${parseInt(Math.random()*256)}, ${parseInt(Math.random()*256)}, ${parseInt(Math.random()*256)})`;
// }