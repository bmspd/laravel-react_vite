import type {RootState} from "../../store";

export const selectMenuState = (state:RootState):boolean  => state.interface.isMenuOpen
