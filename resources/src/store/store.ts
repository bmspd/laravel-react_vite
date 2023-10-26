import {AnyAction, combineReducers, configureStore} from '@reduxjs/toolkit'
import AuthSlice, { resetStore } from './reducers/AuthSlice/AuthSlice'
import InterfaceSlice from './reducers/InterfaceSlice/InterfaceSlice'
import ContentsSlice from "./reducers/ContentsSlice/ContentsSlice";

const rootReducer = combineReducers({
  auth: AuthSlice,
  interface: InterfaceSlice,
  contents: ContentsSlice,
})
const reducerProxy = (state: RootState | undefined, action: AnyAction) => {
  if (action.type === resetStore.type) {
    return rootReducer(undefined, action)
  }
  return rootReducer(state, action)
}

export type RootState = ReturnType<typeof rootReducer>

export type AppDispatch = typeof store.dispatch

export const store = configureStore({
  reducer: reducerProxy,
  middleware: (getDefaultMiddleware) => getDefaultMiddleware(),
})


