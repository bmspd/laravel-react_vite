import { createAsyncThunk } from '@reduxjs/toolkit'

import { Services } from '../../../http/services'
import type { RootState } from '../../store'
import { ContentsRequestParams } from '../../../http/services/ContentsService'
import {validateCache} from "../../../utils/cache";
import {validatePagination} from "../../../utils/pagination";

export const getAllContents = createAsyncThunk(
  'contents/getAllContents',
  async (params: Omit<ContentsRequestParams, 'include'>) => {
    const res = await Services.CONTENTS.getContents({ ...params, include: ['type'] })
    return res.data
  },
  {
    condition(arg, api) {
      const { contents } = api.getState() as RootState
      if (validateCache(arg, contents.contents.meta.timestamps)) {
        return true
      }
      if (validatePagination(arg, contents.contents.meta.pagination)) {
        return true
      }
      return false
    },
  }
)
