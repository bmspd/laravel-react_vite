import React, { DetailedHTMLProps, InputHTMLAttributes, useId } from 'react'
import cn from 'classnames'

type InputDefProps = DetailedHTMLProps<InputHTMLAttributes<HTMLInputElement>, HTMLInputElement>

export interface InputProps extends InputDefProps {
  label?: string
}

const Input = React.forwardRef<HTMLInputElement, InputProps>((props, ref) => {
  const { id, className, label, ...rest } = props
  const generatedId = useId()
  return (
    <div>
      <label
        htmlFor={id ?? generatedId}
        className="block mb-2 text-sm font-medium dark:text-white"
      >
        {label}
      </label>
      <input ref={ref} id={id ?? generatedId} className={cn('input', className)} {...rest} />
    </div>
  )
})
Input.displayName = 'Input'
export default Input
