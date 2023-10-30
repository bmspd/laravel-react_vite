import React from 'react'
import {
  IconBook2,
  IconCheck,
  IconMovie,
  IconPlayerPause,
  IconPlayerPlayFilled,
  IconPlus,
  IconRotate,
} from '@tabler/icons-react'
import { ContentStatus, ContentTypeAction } from '../../../interfaces/Content'

export const ActionIcon = ({ action }: { action?: ContentTypeAction }) => {
  if (action === 'read') return <IconBook2 strokeWidth={1} width={28} height={28} />
  if (action === 'watch') return <IconMovie strokeWidth={1} width={28} height={28} />
  return null
}

export const UserStatusIcon = ({ status }: { status: ContentStatus }) => {
  const { name } = status
  if (name === 'postponed')
    return <IconPlayerPause color="red" strokeWidth={1} width={28} height={28} />
  if (name === 'planned') return <IconPlus color="blue" strokeWidth={2} width={28} height={28} />
  if (name === 'viewed' || name === 'finished')
    return <IconCheck color="green" strokeWidth={2} width={28} height={28} />
  if (name === 'rereading' || name === 'rewatching')
    return <IconRotate color="orange" strokeWidth={2} width={28} height={28} />
  if (name === 'watching' || name === 'reading')
    return <IconPlayerPlayFilled style={{ color: 'green' }} width={28} height={28} />
  return null
}
