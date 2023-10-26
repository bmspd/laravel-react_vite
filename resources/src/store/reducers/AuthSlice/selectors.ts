import type { RootState } from '../../store'
import {IUser} from "../../../interfaces/User";

export const selectIsAuth = (state: RootState):boolean => state.auth.isAuth

export const selectUser = (state:RootState):IUser | null  => state.auth.user
