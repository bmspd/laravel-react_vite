import {createAsyncThunk} from "@reduxjs/toolkit";
import {Services} from "../../../http/services";

export const getAllContents = createAsyncThunk('contents/getAllContents', async () => {
  const res = await Services.CONTENTS.getContents({});
  return res.data
})
