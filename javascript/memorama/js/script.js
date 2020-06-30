class Memorama {
	constructor() {
		this.totalTarjetas = [];
		this.numeroTarjetas = 0;
		this.verificadorTarjetas = [];
		this.errores = 0;
		this.nivelDificultad = '';
		this.imagenesCorrectas = [];
		this.agregadorTarjetas = [];
		
		this.$contenedorGeneral = document.querySelector('contenedor-general');
		this.$contenedorTarjetas = document.querySelector('.contenedor-tarjetas');
		this.$pantallaBloqueada = document.querySelector('.pantalla-bloqueada');
		this.$mensaje = document.querySelector('h2.mensaje');
		//Llamado a los eventos
		this.eventos();
		
	}
	
	eventos() {
		window.addEventListener('DOMContentLoaded', () => {
				this.cargaPantalla();
		});
	}
	
	async cargaPantalla() {
		
		const respuesta = await fetch('memo.json');
		const data = await respuesta.json();
		//console.log(data);
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
		this.comienzaJuego();
		
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
		this.voltearTarjeta(e);
		
		let srcImg = e.target.childNodes[0].attributes[1].value;
		
		this.verificadorTarjetas.push(srcImg);
		
		let tarjeta = e.target;
		this.agregadorTarjetas.unshift(tarjeta);
		
		this.comparadorTarjetas(this.verificadorTarjetas);
	}
	
	voltearTarjeta(e) {
		e.target.style.backgroundImage='none';
		e.target.style.backgroundColor='#ffff';
		e.target.childNodes[0].style.display = 'block';
	}
	
	comparadorTarjetas(tarjetas) {
		if (tarjetas.length == 2) {
			if (tarjetas[0] == tarjetas[1]) {
				this.fijarParaAcertado(this.agregadorTarjetas);
			} else {
				this.errorTarjetas(this.agregadorTarjetas);
				this.errores++;
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
	}
	
	errorTarjetas(arrTarjetasError) {
		arrTarjetasError.forEach(tarjeta => {
			setTimeout(() => {
				tarjeta.style.backgroundImage='url("img/cover.jpg")';
				tarjeta.childNodes[0].style.display='none';
			}, 1000);
		});
	}
	
	
	orden(a,b) {
		return Math.random() - 0.5;
	}
	
}

new Memorama();
