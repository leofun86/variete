let posX = 0; let posY = 0; let intervalo; 
let contexto;
const animar = ()=>{
    contexto = document.getElementById('elCanvas').getContext('2d');
    intervalo = setInterval(()=>{ dibujar(); console.log(`Dibujo ${posX}`) }, 20);
}
const dibujar = () => {
    contexto.clearRect(0, 0, 500, 500);
    contexto.fillStyle = '#ff0000';
    contexto.fillRect(posX, 100, 100, 50);
    posX <= 390 ? posX+=10 : clearInterval(intervalo)
}

document.getElementById('container').onload = ()=>{
    animar();
}