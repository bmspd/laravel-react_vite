import { AnyAction, combineReducers, configureStore } from '@reduxjs/toolkit'
import AuthSlice, { resetStore } from './reducers/AuthSlice/AuthSlice'
import InterfaceSlice from "./reducers/InterfaceSlice/InterfaceSlice";

const rootReducer = combineReducers({
  auth: AuthSlice,
  interface: InterfaceSlice
})
const reducerProxy = (state: RootState | undefined, action: AnyAction) => {
  if (action.type === resetStore.type) {
    return rootReducer(undefined, action)
  }
  return rootReducer(state, action)
}
export const store = configureStore({
  reducer: reducerProxy,
})

export type RootState = ReturnType<typeof rootReducer>

export type AppDispatch = typeof store.dispatch
