import {IRole} from "./Role";

export interface IUser {
  email: string
  email_verified_at: string | null
  id: number
  name: string
  role: IRole,
  role_id: number
}
