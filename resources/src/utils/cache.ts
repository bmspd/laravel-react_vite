import moment from 'moment'

import { Timestamps } from '../interfaces/Data'
import { DEFAULT_CACHE } from '../constants/app'

type TValidateCache = (arg: { page?: number }, timestamps: Timestamps | undefined) => boolean
export const validateCache: TValidateCache = (arg, timestamps) => {
  const reqTime = timestamps?.request_time
  if (reqTime) {
    const lastTime = moment.utc(reqTime)
    const diff = moment.utc().diff(lastTime, 'minutes')
    if (DEFAULT_CACHE < diff) {
      // eslint-disable-next-line no-param-reassign
      arg.page = 1
      return true
    }
  }
  return false
}
