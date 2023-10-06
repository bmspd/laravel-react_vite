import React, { ButtonHTMLAttributes, DetailedHTMLProps } from 'react'
import cn from 'classnames'
import {BUTTON_SIZES} from "../../constants/buttons";

type ReactBtnProps = DetailedHTMLProps<ButtonHTMLAttributes<HTMLButtonElement>, HTMLButtonElement>

export interface ButtonProps extends ReactBtnProps {
  buttonType?: 'default'
  buttonSize?: keyof typeof BUTTON_SIZES
  children: React.ReactNode
}

const baseButtonSize = 'px-5 py-2.5 text-sm'
const Button: React.FC<ButtonProps> = ({ buttonType = 'default', buttonSize = 'SMALL', children, ...props }) => {
  const { className, ...rest } = props
  return (
    <button className={cn(className, BUTTON_SIZES[buttonSize], 'btn')} {...rest}>
      {children}
    </button>
  )
}

export default Button
