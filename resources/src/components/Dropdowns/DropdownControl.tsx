import React from 'react'
import { Menu } from '@headlessui/react'
import { IconChevronDown } from '@tabler/icons-react'

export type DropdownControlProps = {
  title?: string
}
const DropdownControl: React.FC<DropdownControlProps> = ({ title = 'Options' }) => (
  <Menu.Button className="btn flex gap-2 h-9 px-3 py-2 text-sm items-center">
    {title}
    <IconChevronDown width='16'  className="mt-1 text-white" aria-hidden="true" />
  </Menu.Button>
)

export default DropdownControl
