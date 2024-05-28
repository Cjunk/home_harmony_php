canvas = document.getElementById('myCanvas');
var ctx = canvas.getContext("2d");
theMap = [1, 2, 3, 3, 2, 1, 2, 3, 2, 0, 0, 1, 2, 3, 2, 3, 2, 3]

class Ball {
    #radius;
    #destinationx
    #destinationy
    constructor(canvas, radius, speed, color,destinationx,destinationy) {
        console.log(canvas.width)
        this.#radius = radius
        this.#destinationx = destinationx
        this.#destinationy = destinationy
        this.x = 1424
        this.y = (canvas.height / 2)
        this.speed = speed
        this.color = color;
    }
    get radius() {
        return this.#radius
    }
    drawMe(ctx) {
        ctx.fillStyle = this.color
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fill();
        ctx.closePath;
        this.x = this.x - this.speed
        if (this.x <= this.#destinationx - this.radius) {
            this.speed = 0
        }

        ctx.font = '156px Arial'
        ctx.textAlign = 'center'; // Set the text alignment
        ctx.fillText('BALL      N', canvas.width / 2, 450)
    }
    update(canvas) {

    }

}
var balls = []
balls.push(new Ball(canvas, 60, 3, 'orange',845))
balls.push(new Ball(canvas, 60, 1.6, 'red',970))



function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // Filter the balls array to remove any balls with x < 0
    balls = balls.filter(ball => ball.x >= 0 - ball.radius);
    balls.forEach(ball => {
        ball.drawMe(ctx);
    });
    requestAnimationFrame(animate);
}

animate();
