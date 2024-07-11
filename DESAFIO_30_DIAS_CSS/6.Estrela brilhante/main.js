document.addEventListener("mousemove", parallax);
document.addEventListener("mousemove", color);

function parallax(e) {
    this.querySelectorAll(".estrela").forEach((star) => {
        var p = document.getElementById("texto");
        const speed = star.getAttribute("data-speed");
        let x,y;
        x = ((window.innerWidth/2)-e.pageX)/(10*speed);
        y = ((window.innerHeight/2)-e.pageY)/(10*speed);
        p.innerText = `Width: ${window.innerWidth}, Height: ${window.innerHeight}\nmX: ${e.pageX}, mY: ${e.pageY}`;
        star.style.transform = `translateX(${x}px) translateY(${y}px)`;
    });
}

function color(e){
    if(e.pageX>(window.innerWidth/0.7)){
        document.body.get = `rgb(${parseInt(Math.ramdom()*256)}, ${parseInt(Math.ramdom()*256)}, ${parseInt(Math.ramdom()*256)})`;
    }
}