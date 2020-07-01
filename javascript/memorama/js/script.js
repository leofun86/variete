class Memorama {
	constructor() {
		this.totalTarjetas = [];
		this.numeroTarjetas = 0;
		this.verificadorTarjetas = [];
		this.errores = 0;
		this.intentos = 0;
		this.acertados = 0;
		this.nivelDificultad = '';
		this.imagenesCorrectas = [];
		this.agregadorTarjetas = [];
		this.nivel=0;
		
		this.spanIntentos = document.getElementById('intentos');
		this.$contenedorGeneral = document.querySelector('contenedor-general');
		this.$contenedorTarjetas = document.querySelector('.contenedor-tarjetas');
		this.$pantallaBloqueada = document.querySelector('.pantalla-bloqueada');
		this.$mensaje = document.querySelector('h2.mensaje');
		
		this.$pantallaDinamica = document.getElementById('pantalla_dinamica');
		this.$pantallaDinamicaCont = document.getElementById('pantalla_dinamica_cont');
		
		//Llamado a los eventos
		this.eventos();
		
	}
	
	eventos() {
		window.addEventListener('DOMContentLoaded', () => {
			this.cargaPantalla();
			window.addEventListener('contextmenu', e => {
				e.preventDefault();
			}, false);
		});
	}
	
	cargaPantalla() {
		this.valoresInicio();
		this.pantallaInicio();
	}
	
	async cargarTarjetas() {
		const respuesta = await fetch('memo.json');
		const data = await respuesta.json();
		this.totalTarjetas = data;
		var val=0;
		if (this.totalTarjetas.length > 0) {
			this.totalTarjetas.sort(this.orden);
		}
		
		this.numeroTarjetas = this.totalTarjetas.length;
		
		let html = '';
		this.totalTarjetas.forEach(tarjeta => {
			const fragment = document.createDocumentFragment();
			const div = document.createElement('div');	
			const card = document.createElement('img');
			div.classList.add('tarjeta');
			card.classList.add('tarjeta-img');
			card.setAttribute('src', `${tarjeta.src}`);
			card.setAttribute('alt', 'imagen memorama');
			div.appendChild(card);
			fragment.appendChild(div);
			this.$contenedorTarjetas.appendChild(fragment);
		});
		
		$('.contenedor-tarjetas').fadeIn('slow');
		
		this.comienzaJuego();
	}
	
	pantallaInicio() {
		this.$pantallaDinamicaCont.innerHTML="<h1 class='mb-2'>Elige un nivel</h1><div><button class='btn btn-primary btn-lg my-1' id='btn_nivel_1'>Nivel 1</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-success btn-lg my-1' id='btn_nivel_2'>Nivel 2</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-warning btn-lg my-1' id='btn_nivel_3'>Nivel 3</button></div>";
		document.getElementById('btn_nivel_1').addEventListener('click', () => {
			this.intentos=10;
			this.spanIntentos.textContent=this.intentos;
			setTimeout(()=>{ $(this.$pantallaDinamica).slideUp(); }, 200);
		});
		document.getElementById('btn_nivel_2').addEventListener('click', () => {
			this.intentos=8;
			this.spanIntentos.textContent=this.intentos;
			setTimeout(()=>{ $(this.$pantallaDinamica).slideUp(); }, 200);
		});
		document.getElementById('btn_nivel_3').addEventListener('click', () => {
			this.intentos=6;
			this.spanIntentos.textContent=this.intentos;
			setTimeout(()=>{ $(this.$pantallaDinamica).slideUp(); }, 200);
		});
		this.cargarTarjetas();
	}
	
	valoresInicio() {
		this.intentos=0;
		this.acertados=0;
	}
	
	comienzaJuego() {
		const tarjetas = document.querySelectorAll('.tarjeta');
		tarjetas.forEach(tarjeta => {
			tarjeta.addEventListener('click', (e) => {
				this.clickTarjeta(e);
			});
		})
	}
	
	clickTarjeta(e) {
		this.voltearTarjeta(e.target);
		
		let srcImg = e.target.childNodes[0].attributes[1].value;
		this.verificadorTarjetas.push(srcImg);
		
		this.agregadorTarjetas.unshift(e.target);
		
		this.comparadorTarjetas(this.verificadorTarjetas);
	}
	
	voltearTarjeta(div_tarjeta) {
		div_tarjeta.style.backgroundColor='#ffff';
		div_tarjeta.style.backgroundImage='none';
		$(div_tarjeta.childNodes[0]).slideDown();
	}
	
	comparadorTarjetas(tarjetas) {
		if (tarjetas.length == 2) {
			if (tarjetas[0] == tarjetas[1]) {
				this.fijarParaAcertado(this.agregadorTarjetas);
				this.acertados++;
				document.getElementById('acertados').textContent=this.acertados;
			} else {
				this.errorTarjetas(this.agregadorTarjetas);
				this.intentos--;
				this.derrotaJuego(this.intentos);
				this.spanIntentos.textContent=this.intentos;
			}
			this.verificadorTarjetas.splice(0);
			this.agregadorTarjetas.splice(0);
		}
	}
	
	fijarParaAcertado(arrTarjetasAcertadas) {
		arrTarjetasAcertadas.forEach(tarjeta => {
			tarjeta.classList.add('acertada');
			this.imagenesCorrectas.push(tarjeta);
		});
		this.victoriaJuego();
	}
	
	errorTarjetas(arrTarjetasError) {
		arrTarjetasError.forEach(tarjeta => {
			setTimeout(()=>{ $(tarjeta.childNodes[0]).fadeOut(); }, 500);
			setTimeout(() => { tarjeta.style.backgroundImage='url("img/cover.jpg")'; }, 1000);
		});
	}
	
	orden(a,b) {
		return Math.random() - 0.5;
	}
	
	victoriaJuego() {
		if (this.totalTarjetas.length == this.imagenesCorrectas.length) {
			setTimeout(()=>{
				$(this.$pantallaDinamica).slideDown();
				this.$pantallaDinamicaCont.innerHTML="<h1 class='mb-2'>¡Ganaste!</h1><button id='reset' class='btn btn-success btn-lg mt-2'>Resetear</button>";
				document.getElementById('reset').addEventListener('click', () => {
					document.getElementById('msjFinal').innerHTML="";
					this.$contenedorTarjetas.innerHTML='';
					this.cargaPantalla();
					$(this.$pantallaDinamica).slideUp();
				});
			}, 200);
		}
	}
	
	derrotaJuego(intentos) {
		if (intentos == 0) {
			setTimeout(()=>{
				$(this.$pantallaDinamica).slideDown();
				this.$pantallaDinamicaCont.innerHTML="<h1 class='mb-2'>¡Perdiste!</h1><button id='reset' class='btn btn-success btn-lg mt-2'>Resetear</button>";
				document.getElementById('reset').addEventListener('click', () => {
					document.getElementById('msjFinal').innerHTML="";
					this.$contenedorTarjetas.innerHTML='';
					this.cargaPantalla();
					$(this.$pantallaDinamica).slideUp();
				});
			}, 200);
		}
	}
	
}

new Memorama();
