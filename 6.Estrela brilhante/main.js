document.addEventListener("mousemove", parallax);

function parallax(e) {
    this.querySelectorAll(".estrela").forEach((star) => {
        var p = document.getElementById("texto");
        const speed = star.getAttribute("data-speed");
        let x,y;
        if (e.pageX > (window.innerWidth / 2)) {
            x = e.pageX % (window.innerWidth / 2);
        } else {
            x = e.pageX + (window.innerWidth / 2);
        }
        if (e.pageY > (window.innerHeight / 2)) {
            y = e.pageY % (window.innerHeight / 2);
        } else {
            y = e.pageY + (window.innerHeight / 2);
        }
        p.innerText = "Width: " + window.innerWidth + ", " + "Height: " + window.innerHeight + "\n" + "mX: " + e.pageX + ", mY: " + e.pageY + "\nx: " + x + ", y:" + y;
        star.style.transform = `translateX(${x}px) translateY(${y}px)`;
    });
}