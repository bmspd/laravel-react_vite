import { AxiosResponse } from 'axios'
import $http from '../index'
import { IUser } from '../../interfaces/User'

export type LoginRequestBody = {
  name: string
  password: string
}
export type SignUpRequestBody = {
  name: string
  email: string
  password: string
  password_confirmation: string
}
export default class AuthService {
  static async login(data: LoginRequestBody) {
    return $http.post<IUser>('auth/login', data, {
      params: {
        'include[0]': 'role',
      },
    })
  }

  static async whoAmI() {
    return $http.get('auth/who-am-i')
  }

  static async getCookies() {
    return $http.get('/sanctum/csrf-cookie')
  }

  static async signUp(data: SignUpRequestBody) {
    return $http.post('auth/register', data)
  }

  static async logout() {
    return $http.get('auth/logout')
  }
}
