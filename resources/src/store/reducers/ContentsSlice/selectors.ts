import type { RootState } from '../../store'
import { IContent } from '../../../interfaces/Content'
import { DataWithMeta } from '../../../interfaces/Data'

export const selectContents = (
  state: RootState
): DataWithMeta<IContent, 'pagination' | 'timestamps'> => state.contents.contents
