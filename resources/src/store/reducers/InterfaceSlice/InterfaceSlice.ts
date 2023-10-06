import { createSlice, PayloadAction } from '@reduxjs/toolkit'

type InterfaceState = {
  isMenuOpen: boolean
}

const initialState: InterfaceState = {
  isMenuOpen: false,
}

export const interfaceSlice = createSlice({
  name: 'interface',
  initialState,
  reducers: {
    setIsMenuOpen: (state: InterfaceState, action: PayloadAction<boolean>) => {
      state.isMenuOpen = action.payload
    },
    toggleIsMenuOpen: (state: InterfaceState) => {
      state.isMenuOpen = !state.isMenuOpen
    }
  },
})
export const { setIsMenuOpen, toggleIsMenuOpen } = interfaceSlice.actions
export default interfaceSlice.reducer
