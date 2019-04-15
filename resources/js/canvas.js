var canvas = document.querySelector("#particles");
if (canvas) {
    var parent = $("#about")
    var parentWidth = parent.innerWidth();
    var parentHeight = parent.innerHeight();
    canvas.width = parentWidth;
    canvas.height = parentHeight;
    var c = canvas.getContext('2d');
    var max_circles = 10;
    var circleArray = [];
    for (var i = 0; i < max_circles; i++) {
        var radius = Math.random() * 10;
        var x = Math.random() * (parentWidth - radius * 2) + radius;
        var y = Math.random() * (parentHeight - radius * 2) + radius;
        var dx = Math.random() - 0.5;
        var dy = Math.random() - 0.5;
        circleArray.push(new Circle(x, y, dx, dy, radius));
    }

    function Circle(x, y, dx, dy, radius) {
        this.x = x;
        this.y = y;
        this.dx = Math.random() * dx * 8;
        this.dy = Math.random() * dy * 8;
        this.radius = radius;
        var r = Math.random() * 255;
        var g = Math.random() * 255;
        var b = Math.random() * 255;
        //var r = 200;
        //var g = 200;
        //var b = 200;
        this.draw = function () {
            c.beginPath();
            c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
            c.fillStyle = "rgba(" + r + "," + g + "," + b + ",1)"
            c.strokeStyle = "rgba(" + r + "," + g + "," + b + ",.5)"
            c.lineWidth = 2.5;
            c.stroke();
            c.fill();
        }
        this.update = function () {
            if (this.x + this.radius > parentWidth || this.x - this.radius < 0) {
                this.dx = -this.dx;
            }
            if (this.y + this.radius > parentHeight || this.y - this.radius < 0) {
                this.dy = -this.dy;
            }
            this.x += this.dx;
            this.y += this.dy;

            this.draw();
        }
    }
    function animate() {
        requestAnimationFrame(animate);
        c.clearRect(0, 0, parentWidth, parentHeight);

        for (var i = 0; i < max_circles; i++) {
            circleArray[i].update();
        }
    }
    animate();
}
