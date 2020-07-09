import { Component, OnInit } from '@angular/core';
import { StockService } from "../../stock.service";
import { VarieteService } from "../../variete.service";
import $ from 'jquery';

@Component({
  selector: 'app-stocklist',
  templateUrl: './stocklist.component.html',
  styleUrls: ['./stocklist.component.css']
})
export class StocklistComponent implements OnInit {

  constructor(private StockService: StockService, private VarieteService: VarieteService) { }

  ngOnInit() {
    this.mostrarTodos();
    this.mostrarDatos();
  }

  stock:any;

  id_stock = undefined;

  cargando:boolean = this.VarieteService.cargando;

  editStock = {
    id:undefined,
    id_producto:undefined,
    nombre_producto:"",
    ci_cliente:undefined,
    nombre_cliente:"",
    cantidad:undefined,
  };

  datosActuales = {
    nombre_producto:"",
    ci_cliente:undefined,
    nombre_cliente:"",
    cantidad:undefined,
  }
  
  clientes_list:any; productos_list:any;
  clientes_list_todos:any; productos_list_todos:any;

  addStock = {
    id_producto:undefined,
    ci_cliente:undefined,
    cantidad:undefined,
  }

  mostrarDatos() {
    this.StockService.getProductosList().subscribe(
      result => { this.productos_list = result; }
    );
    this.StockService.getClientesList().subscribe(
      result => { this.clientes_list = result; }
    );
    this.StockService.getProductosListTodos().subscribe(
      result => { this.productos_list_todos = result; }
    );
    this.StockService.getClientesListTodos().subscribe(
      result => { this.clientes_list_todos = result; }
    );
  }
  mostrarTodos() {
    this.cargando=true;
    this.StockService.getStock().subscribe(
      result => {
        this.stock = result;
        this.cargando=false;
        this.VarieteService.cargando=false;
        console.log(this.stock);
      }
      );
  }
  editarStock(id:number, id_producto:number, nombre_producto:string, ci_cliente:number, nombre_cliente:string, cantidad:number) {
    this.datosActuales.nombre_producto=nombre_producto;
    this.datosActuales.nombre_cliente=nombre_cliente;
    this.datosActuales.ci_cliente=ci_cliente;
    this.datosActuales.cantidad=cantidad;
    this.editStock.id=id;
    this.editStock.id_producto=id_producto;
    this.editStock.ci_cliente=ci_cliente;
    this.editStock.cantidad=cantidad;
    $('#editarStock').fadeIn();
  }
  stockEditado() {
    //console.log(this.editStock)
    this.editStock.id_producto=Number(this.editStock['id_producto']);
    this.editStock.ci_cliente=Number(this.editStock['ci_cliente']);
    this.editStock.cantidad=Number(this.editStock['cantidad']);
    console.log('ID PRODUCTO');
    console.log(this.editStock.id_producto);
    console.log('CI CLIENTE');
    console.log(this.editStock.ci_cliente);
    console.log('CANTIDAD');
    console.log(this.editStock.cantidad);
    
    this.StockService.editarStock(this.editStock).subscribe(()=>{
      this.mostrarTodos();
      $('.txt_result').text('Item editado correctamente');
      $('.alert').css('background', 'rgba(0, 0, 255, 0.2)');
      $('.alert').slideDown();
      setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    });
  }
  agregarStock(){
    this.addStock.id_producto=Number(this.addStock['id_producto']);
    this.addStock.ci_cliente=Number(this.addStock['ci_cliente']);
    this.addStock.cantidad=Number(this.addStock['cantidad']);
    this.StockService.agregarStock(this.addStock).subscribe(()=>{
      this.mostrarTodos();
      $('.txt_result').text('Item agregado correctamente');
      $('.alert').css('background', 'rgba(0, 255, 0, 0.2)');
      $('.alert').slideDown();
      setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    });
  }
  fadeInAddStock() {
    $('#agregarStock').fadeIn();
  }
  preEliminarStock(id) {
    this.id_stock=id;
    $('#eliminarStock').fadeIn();
  }
  eliminarStock() {
    $('.txt_result').text('Item eliminado correctamente');
    $('.alert').css('background', 'rgba(255, 0, 0, 0.2)');
    $('.alert').slideDown();
    setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    this.StockService.eliminarStock(this.id_stock).subscribe(result=>{
      this.mostrarTodos();
    });
    
  }
}
