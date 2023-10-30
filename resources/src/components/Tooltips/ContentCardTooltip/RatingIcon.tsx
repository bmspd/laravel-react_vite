import React from 'react'
import {
  IconNumber10Small,
  IconNumber1Small,
  IconNumber2Small,
  IconNumber3Small,
  IconNumber4Small,
  IconNumber5Small,
  IconNumber6Small,
  IconNumber7Small,
  IconNumber8Small,
  IconNumber9Small,
} from '@tabler/icons-react'

const numberIcon = (number?: number | null) => {
  switch (number) {
    case 1:
      return IconNumber1Small
    case 2:
      return IconNumber2Small
    case 3:
      return IconNumber3Small
    case 4:
      return IconNumber4Small
    case 5:
      return IconNumber5Small
    case 6:
      return IconNumber6Small
    case 7:
      return IconNumber7Small
    case 8:
      return IconNumber8Small
    case 9:
      return IconNumber9Small
    case 10:
      return IconNumber10Small
    default:
      return null
  }
}
const RatingIcon = ({ rating }: { rating?: number | null }) => {
  const Icon = numberIcon(rating)
  if (!Icon) return null
  return (
    <Icon
      width={26}
      height={26}
      className="border-2 border-zinc-800 rounded-full bg-yellow-300/50 text-zinc-800"
    />
  )
}

export default RatingIcon
