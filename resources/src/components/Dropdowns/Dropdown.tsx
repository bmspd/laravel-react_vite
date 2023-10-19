import React, {Fragment, ReactElement} from 'react'
import { Menu, Transition } from '@headlessui/react'
import DropdownControl, {DropdownControlProps} from './DropdownControl'

export type DropdownOption = {
  value: string
  label: ReactElement | string
  onClick?: () => void
}

export interface DropdownProps {
  options: DropdownOption[],
  controlProps?: DropdownControlProps,
}

const Dropdown: React.FC<DropdownProps> = ({ options, controlProps }) => {
  return (
    <Menu as="div" className="relative inline-block text-left">
      <div>
        <DropdownControl {...controlProps}/>
      </div>

      <Transition
        as={Fragment}
        enter="transition ease-out duration-100"
        enterFrom="transform opacity-0 scale-95"
        enterTo="transform opacity-100 scale-100"
        leave="transition ease-in duration-75"
        leaveFrom="transform opacity-100 scale-100"
        leaveTo="transform opacity-0 scale-95"
      >
        <Menu.Items className="absolute right-0 z-10 mt-2 w-auto origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          <div className="py-1">
            {options.map((option) => (
              <Menu.Item
                as="div"
                className="whitespace-nowrap text-black px-4 py-2 cursor-pointer hover:bg-sky-100 transition-colors duration-300"
                key={option.value}
                onClick={option.onClick}
              >
                {() => (typeof option.label === 'string' ? <div>{option.label}</div> : option.label)}
              </Menu.Item>
            ))}
          </div>
        </Menu.Items>
      </Transition>
    </Menu>
  )
}

export default Dropdown
