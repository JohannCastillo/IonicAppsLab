import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ProductoModel } from '../models/ProductoModel';

@Injectable({
  providedIn: 'root'
})
export class ProductosService {
  private url = "http://localhost:8000/api/productos"
  
  constructor(private http : HttpClient) { }

  ObtenerTodos(){ 
    return this.http.get<[ProductoModel]>(this.url); 
  } 
 
  Agregar(producto:ProductoModel){ 
    return this.http.post(this.url,producto); 
  } 

  Editar(productoid: number, producto : ProductoModel){
    return this.http.put(this.url + "/" + productoid, producto);
  }

  Eliminar(productoid: number){
    return this.http.delete(this.url + "/" + productoid);
  }
}
