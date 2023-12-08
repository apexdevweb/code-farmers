const canvas = document.getElementById("canvas1");
const ctx = canvas.getContext("2d");
canvas.width = 1200;
canvas.height = 700;

class Cell {
  constructor(effect, x, y) {
    this.effect = effect;
    this.x = x;
    this.y = y;
    this.width = this.effect.width;
    this.height = this.effect.height;
    this.image = document.getElementById("projectImage");
    this.slideX = 0;
    this.slideY = 0;
    this.vx = 0;
    this.vy = 0;
    this.ease = 0.1;
    this.friction = 0.8;
  }
  draw(context) {
    context.drawImage(
      this.image,
      this.x + this.slideX,
      this.y + this.slideY,
      this.width,
      this.height,
      this.x,
      this.y,
      this.width,
      this.height
    );
    // context.strokeRect(this.x, this.y, this.width, this.height);
  }
  update() {
    const dx = this.effect.mouse.x - this.x;
    const dy = this.effect.mouse.y - this.y;
    const distance = Math.hypot(dx, dy);
    if (distance < this.effect.mouse.radius) {
      const angle = Math.atan2(dy, dx);
      const force = distance / this.effect.mouse.radius;
      this.vx = force * Math.cos(angle);
      this.vy = force * Math.sin(angle);
    }
    //si on change les opérateur Mathématique cela change les effet de disloquance
    this.slideX -= (this.vx *= this.friction) + this.slideX * this.ease;
    this.slideY -= (this.vy *= this.friction) + this.slideY * this.ease;
  }
}

class Effect {
  constructor(canvas) {
    this.canvas = canvas;
    this.width = this.canvas.width;
    this.height = this.canvas.height;
    this.cellWidht = this.width / 35;
    this.cellHeight = this.height / 55;
    this.cell = new Cell(this, 0, 0);
    this.imageGrid = [];
    this.createGrid();
    this.mouse = {
      x: undefined,
      y: undefined,
      radius: 150,
    };
    this.canvas.addEventListener("mousemove", (e) => {
      this.mouse.x = e.offsetX;
      this.mouse.y = e.offsetY;
    });
    this.canvas.addEventListener("mouseleave", (e) => {
      this.mouse.x = undefined;
      this.mouse.y = undefined;
    });
  }

  createGrid() {
    for (let y = 0; y < this.height; y += this.cellHeight) {
      for (let x = 0; x < this.width; x += this.cellWidht) {
        this.imageGrid.push(new Cell(this, x, y));
      }
    }
  }

  render(context) {
    this.imageGrid.forEach((cell, i) => {
      cell.update();
      cell.draw(context);
    });
  }
}
const effect = new Effect(canvas);

function animate() {
  effect.render(ctx);
  requestAnimationFrame(animate);
}
requestAnimationFrame(animate);
