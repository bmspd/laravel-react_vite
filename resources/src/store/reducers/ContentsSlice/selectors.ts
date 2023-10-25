import {RootState} from "../../store";
import {IContent} from "../../../interfaces/Content";

export const selectContents = (state: RootState):IContent[] => state.contents.contents.data
