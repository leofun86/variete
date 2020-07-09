import { Component, OnInit } from '@angular/core';
import { ProductoService } from "../../producto.service";
import { VarieteService } from 'src/app/variete.service';
import $ from 'jquery';

@Component({
  selector: 'app-productoslist',
  templateUrl: './productoslist.component.html',
  styleUrls: ['./productoslist.component.css']
})
export class ProductoslistComponent implements OnInit {

  constructor(private ProductoService: ProductoService, private VarieteService: VarieteService) { }

  ngOnInit(): void {
    this.mostrarTodos();
  }

  productos:any;

  cargando:boolean = this.VarieteService.cargando;

  editProducto = {
    id_producto:undefined,
    descripcion:"",
    precio:undefined,
  };

  addProducto = {
    id_producto:undefined,
    descripcion:"",
    precio:undefined,
  }

  id_prod:undefined;

  mostrarTodos() {
    this.cargando=true;
    this.ProductoService.getProductos().subscribe(
      result => {
        this.productos = result;
        this.cargando=false;
        this.VarieteService.cargando = false;
      }
      );
  }
  editarProducto(id:number, descripcion:string, precio:number) {
    this.editProducto.id_producto=id;
    this.editProducto.descripcion=descripcion;
    this.editProducto.precio=precio;
    $('#editarProducto').fadeIn();
  }
  productoEditado() {
    //console.log(this.editStock)
    this.editProducto.id_producto=Number(this.editProducto['id_producto']);
    this.editProducto.precio=Number(this.editProducto['precio']);
    this.ProductoService.editarProducto(this.editProducto).subscribe(()=>{
      this.mostrarTodos();
      $('.txt_result').text('Producto editado correctamente');
      $('.alert').css('background', 'rgba(0, 0, 255, 0.2)');
      $('.alert').slideDown();
      setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    });
    //this.mostrarTodos();
  }
  agregarProducto(){
    this.addProducto.id_producto=Number(this.addProducto['id_producto']);
    this.addProducto.precio=Number(this.addProducto['precio']);
    this.ProductoService.agregarProducto(this.addProducto).subscribe(()=>{
      this.mostrarTodos();
      this.addProducto = { id_producto:undefined, descripcion:"", precio:undefined, };
      $('.txt_result').text('Producto agregado correctamente');
      $('.alert').css('background', 'rgba(0, 255, 0, 0.2)');
      $('.alert').slideDown();
      setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    });
  }
  fadeInAddProducto() {
    $('#agregarProducto').fadeIn();
  }
  preEliminarProducto(id) {
    this.id_prod=id;
    $('#eliminarStock').fadeIn();
  }
  eliminarProducto() {
    $('.txt_result').text('Item eliminado correctamente');
    $('.alert').css('background', 'rgba(255, 0, 0, 0.2)');
    $('.alert').slideDown();
    setTimeout(()=>{ $('.alert').slideUp(); }, 3000);
    this.ProductoService.eliminarProducto(this.id_prod).subscribe(result=>{
      this.mostrarTodos();
    });    
  }
}
