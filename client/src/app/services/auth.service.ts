import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

export interface User {
  id : number,
  name : string,
  email : string,
  status : number,
  email_verified_at : string,
  created_at : string,
}

export interface RegisterDTO {
  name : string,
  email : string,
  password : string,
}

interface AuthResponse {
  user?: User;
  error?: "email" | "password"
}

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  url = "http://localhost:8000/api"
  constructor(
    private http : HttpClient
  ) { }
  
  login(email: string, password : string){
    return this.http.post<AuthResponse>(this.url + "/auth/login", {
      email: email,
      password: password
    })
  }

  register (data : RegisterDTO) : Observable<AuthResponse>{
    return this.http.post<AuthResponse>(this.url + "/auth/register", data)
  }
}
