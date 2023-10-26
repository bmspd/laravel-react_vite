import {createSlice} from "@reduxjs/toolkit";
import {IContent} from "../../../interfaces/Content";
import {getAllContents} from "./asyncThunks";
import {DataWithMeta} from "../../../interfaces/Data";

export type ContentsState = {
  contents: DataWithMeta<IContent, 'pagination' | 'timestamps'>
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
    const {contents} = state
    const {pagination} = contents.meta
    if (!pagination || action.meta.arg.page === 1) {
      state.contents = payload
    }
    else if (pagination.current_page < pagination.total_pages) {
      state.contents = {data: state.contents.data.concat(payload.data), meta: payload.meta}
    }
  })
})

export const {} = contentsSlice.actions

export default contentsSlice.reducer
