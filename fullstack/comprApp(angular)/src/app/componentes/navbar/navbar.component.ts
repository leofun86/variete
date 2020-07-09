import { Component, OnInit } from '@angular/core';
import $ from 'jquery';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
    
  }

  clienteLink() {
    $('#container_clientes').fadeIn();
  }
  fadeOutAdvertencia() {
    $('#advertencia').fadeOut();
  }
  youtube(val){
    switch(val) {
      case 1:
        $('#item_insert').fadeIn();
      break;
      case 2:
        $('#item_update').fadeIn();
      break;
      case 3:
        $('#item_delete').fadeIn();
      break;
      case 4:
        $('#cliente_insert').fadeIn();
      break;
      case 5:
        $('#cliente_update').fadeIn();
      break;
      case 6:
        $('#producto_insert').fadeIn();
      break;
      case 7:
        $('#producto_update').fadeIn();
      break;
    }
  }

}
