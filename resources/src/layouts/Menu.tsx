import React, { Fragment } from 'react'
import { Transition } from '@headlessui/react'
import { useTypedSelector } from '../hooks/storeHooks'
import { selectMenuState } from '../store/reducers/InterfaceSlice/selectors'

const Menu = () => {
  const isMenuOpen = useTypedSelector(selectMenuState)
  return (
    <Transition
      show={isMenuOpen}
      as={Fragment}
      enter="transition-all ease duration-300"
      enterFrom="-translate-x-96"
      enterTo="translate-x-0"
      leave="transition-all ease duration-300"
      leaveFrom="translate-x-0"
      leaveTo="-translate-x-96"
    >
      <div className="fixed left-0 top-16 bg-white/30 p-4 backdrop-blur-sm h-full w-96 z-10">MENU</div>
    </Transition>
  )
}

export default Menu
