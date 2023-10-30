import React from 'react'
import cn from 'classnames'
import { COLORS, COLORS_VARIANTS } from '../../constants/colors'

type TTag = {
  name?: string | null
  variant?: COLORS_VARIANTS
}
const Tag: React.FC<TTag> = ({ name, variant = COLORS_VARIANTS.DEFAULT }) => {
  if (!name) return null
  return (
    <span
      style={{height: 20}}
      className={cn(
        'lowercase text-xs text-white inline-flex justify-center items-center py-0.5 px-2 rounded',
        COLORS[variant]
      )}
    >
      {name}
    </span>
  )
}

export default Tag
