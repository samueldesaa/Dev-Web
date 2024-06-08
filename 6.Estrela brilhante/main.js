document.addEventListener("mousemove", parallax);

function parallax(e) {
    this.querySelectorAll(".estrela").forEach((star) => {
        var p = document.getElementById("texto");
        const speed = star.getAttribute("data-speed");
        const x = ((window.innerWidth - e.pageX * speed)/ 50)+10;
        const y = ((window.innerHeight - e.pageY * speed)/ 50)+10;
        p.innerText = "x: " + x + ", " + "y: " + y;
        star.style.transform = `translateX(${x}px) translateY(${y}px)`;
    });
}