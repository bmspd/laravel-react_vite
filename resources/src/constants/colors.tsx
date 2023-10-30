// eslint-disable-next-line @typescript-eslint/naming-convention
export enum COLORS_VARIANTS {
  'DEFAULT' = 'default',
  'SUCCESS' = 'success',
  'WARNING' = 'warning',
  'ERROR' = 'error'
}

export const COLORS = {
  [COLORS_VARIANTS.DEFAULT]: 'bg-blue-400',
  [COLORS_VARIANTS.SUCCESS]: 'bg-green-700',
  [COLORS_VARIANTS.WARNING]: 'bg-orange-600',
  [COLORS_VARIANTS.ERROR]: 'bg-red-700'
}
