import { createAsyncThunk } from '@reduxjs/toolkit'
import { LoginRequestBody, SignUpRequestBody } from '../../../http/services/AuthService'
import { Services } from '../../../http/services'

export const login = createAsyncThunk('auth/login', async (data: LoginRequestBody, thunkAPI) => {
  try {
    const res = await Services.AUTH.login(data)
    return res.data
    /* eslint-disable-next-line */
  } catch (e: any) {
    return thunkAPI.rejectWithValue(e?.response?.data)
  }
})

export const signUp = createAsyncThunk('auth/signUp', async (data: SignUpRequestBody, thunkAPI) => {
  try {
    const res = await Services.AUTH.signUp(data)
    return res.data
    /* eslint-disable-next-line */
  } catch (e: any) {
    return thunkAPI.rejectWithValue(e?.response?.data)
  }
})
export const whoAmI = createAsyncThunk('auth/whoAmI', async (...args) => {
  const [, thunkApi] = args
  try {
    const res = await Services.AUTH.whoAmI()
    return res.data
    /* eslint-disable-next-line */
  } catch (e: any) {
    return thunkApi.rejectWithValue(e?.response?.data)
  }
})

export const getCookies = createAsyncThunk('auth/getCookies', async () => {
  await Services.AUTH.getCookies()
})
export const logout = createAsyncThunk('auth/logout', async () => {
  const res = await Services.AUTH.logout()
  return res.data
})
