import {createSlice} from "@reduxjs/toolkit";
import {IContent} from "../../../interfaces/Content";
import {getAllContents} from "./asyncThunks";
import {DataWithMeta} from "../../../interfaces/Data";

type ContentsState = {
  contents: DataWithMeta<IContent, 'pagination'>
}
const initialState: ContentsState = {
  contents: {
    data: [],
    meta: {}
  }
}
export const contentsSlice = createSlice({
  name: 'contents',
  initialState,
  reducers: {},
  extraReducers: (builder) => builder.addCase(getAllContents.fulfilled, (state, action) => {
    const { payload } = action
    state.contents = payload
  })
})

export const {} = contentsSlice.actions

export default contentsSlice.reducer
