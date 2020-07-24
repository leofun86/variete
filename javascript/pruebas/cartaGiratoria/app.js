const cajaCartas = document.getElementById('caja-cartas');
const fondo = document.querySelector('.background img');
let girado = false;
//const btnVolver = document.getElementById('btn-volver');

cajaCartas.addEventListener('click', giroDeCarta);
//btnVolver.addEventListener('click', retornarCarta);

let cartas = [
    { id:1, girada:false, igualada:false, backColor: 'green', src: 'assets/emoji_1.png'},
    { id:2, girada:false, igualada:false, backColor: 'green', src: 'assets/emoji_1.png'},
    { id:3, girada:false, igualada:false, backColor: 'yellow', src: 'assets/emoji_2.png'},
    { id:4, girada:false, igualada:false, backColor: 'yellow', src: 'assets/emoji_2.png'},
    { id:5, girada:false, igualada:false, backColor:'orange', src: 'assets/emoji_3.png'},
    { id:6, girada:false, igualada:false, backColor: 'orange', src: 'assets/emoji_3.png'},
    { id:7, girada:false, igualada:false, backColor: 'red', src: 'assets/emoji_4.png'},
    { id:8, girada:false, igualada:false, backColor: 'red', src: 'assets/emoji_4.png'},
    { id:9, girada:false, igualada:false, backColor: 'purple', src: 'assets/emoji_5.png'},
    { id:10, girada:false, igualada:false, backColor: 'purple', src: 'assets/emoji_5.png'},
    { id:11, girada:false, igualada:false, backColor:'pink', src: 'assets/emoji_6.png'},
    { id:12, girada:false, igualada:false, backColor: 'pink', src: 'assets/emoji_6.png'},
];
cartas.sort(()=> { return Math.random() -0.1 })
let cartasEval=[];
function cartasInit() {
    const fragment = document.createDocumentFragment();
    cartas.map(carta => {
        const el = document.createElement('div');
        const img = document.createElement('img');
        el.setAttribute('class', 'carta');
        el.setAttribute('id', carta.id);
        el.style.margin='5px';
        el.style.paddingTop='50px';
        el.appendChild(img);
        fragment.appendChild(el);
    });
    cajaCartas.appendChild(fragment);
}

document.addEventListener('DOMContentLoaded', ()=>{
    cartasInit();
})

function giroDeCarta(e) {
    let cartaSeleccionada = cartas.filter(carta => carta.id == e.target.id);
    if (e.target.className === 'carta' && !cartaSeleccionada[0].igualada) {
        if (!cartaSeleccionada[0].girada) {
            switch (cartaSeleccionada[0].backColor) {
                case 'green':
                    e.target.classList.add('animacion-giro-green');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-green');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
                case 'yellow':
                    e.target.classList.add('animacion-giro-yellow');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-yellow');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
                case 'orange':
                    e.target.classList.add('animacion-giro-orange');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-orange');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
                case 'red':
                    e.target.classList.add('animacion-giro-red');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-red');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
                case 'purple':
                    e.target.classList.add('animacion-giro-purple');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-purple');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
                case 'pink':
                    e.target.classList.add('animacion-giro-pink');
                    setTimeout(()=>{
                        e.target.classList.remove('animacion-giro-pink');
                        e.target.style.backgroundImage=`url(${cartaSeleccionada[0].src})`;
                    }, 501);
                break;
            }
            cartasEvalIgual(cartaSeleccionada[0].id, cartaSeleccionada[0].backColor);
            setTimeout(()=>{ e.target.style.backgroundColor=cartaSeleccionada[0].backColor; },500);
            cartas.map(carta => { if(carta.id == e.target.id) carta.girada=true; })
        } 
    }
};

function cartasEvalIgual(id, color) {
    cartasEval.push({id, color});
    if (cartasEval.length === 2) {
        let id_1 = String(cartasEval[0].id); let id_2 = String(cartasEval[1].id);
        if (cartasEval[0].color == cartasEval[1].color) {
            cartas.map(carta => {
                if (carta.backColor === color) carta.igualada = true;
            });
        } else {
            setTimeout(()=>{
                document.getElementById(id_1).classList.add('animacion-retorno');
                document.getElementById(id_2).classList.add('animacion-retorno');
                cartas.forEach(carta => {
                    if (carta.id == id_1 || carta.id == id_2) carta.girada=false;
                })
                setTimeout(()=>{
                    document.getElementById(id_1).style.backgroundColor='blue';
                    document.getElementById(id_1).style.backgroundImage='url("assets/question.png")';
                    document.getElementById(id_2).style.backgroundColor='blue';
                    document.getElementById(id_2).style.backgroundImage='url("assets/question.png")';
                    document.getElementById(id_1).classList.remove('animacion-retorno');
                    document.getElementById(id_2).classList.remove('animacion-retorno');
                },500);
            }, 1000);
        }
        cartasEval=[];
    }
}

