import { createSlice, PayloadAction } from '@reduxjs/toolkit'
import {login, whoAmI} from './asyncThunks'
import { IUser } from '../../../interfaces/User'
import $http from "../../../http";

type AuthState = {
  isAuth: boolean
  user: null | IUser
}

const initialState: AuthState = {
  isAuth: false,
  user: null,
}

export const authSlice = createSlice({
  name: 'auth',
  initialState,
  reducers: {
    setAuth: (state: AuthState, action: PayloadAction<boolean>) => {
      state.isAuth = action.payload
    },
    resetStore: () => {
      console.log('resetting session data...')
    }
  },
  extraReducers: (builder) =>
    builder.addCase(login.fulfilled, (state, action) => {
      const { payload } = action
      state.isAuth = true
      state.user = payload
    }).addCase(whoAmI.fulfilled, (state, action) => {
      const { payload } = action
      state.isAuth = true
      state.user = payload
    }).addCase(whoAmI.rejected, () => {
      document.cookie = 'XSRF-TOKEN=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'
    })
})

export const { setAuth, resetStore } = authSlice.actions

export default authSlice.reducer
