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
      enter="transition-all duration-300"
      enterFrom="-left-96"
      enterTo="left-0"
      leave="transition-all duration-300"
      leaveFrom="left-0"
      leaveTo="-left-96"
    >
      <div className="fixed left-0 top-16 bg-white/30 p-4 backdrop-blur-sm h-full w-96 z-10">MENU</div>
    </Transition>
  )
}

export default Menu
