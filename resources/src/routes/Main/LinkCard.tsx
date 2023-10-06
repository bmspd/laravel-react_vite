import React, { ReactElement } from 'react'
import { Link } from 'react-router-dom'
import Button from '../../components/Buttons/Button'

type LinkCardProps = {
  title: string
  description: string
  icon: ReactElement
  imgUrl: string
  buttonText: string
  linkTo: string
}
const LinkCard: React.FC<LinkCardProps> = ({ title, description, icon, imgUrl, buttonText, linkTo }) => {
  return (
    <div className="drop-shadow-xl cursor-pointer w-56 h-72 border-solid rounded-xl border border-none relative flex flex-col overflow-hidden hover:scale-105 transition-all duration-300">
      <div className="h-1/2 overflow-hidden rounded-t-xl">
        <img className="min-w-full h-full max-w-none" src={imgUrl} alt="Main links card" />
      </div>
      <div className="center-absolute w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
        {icon}
      </div>
      <div className="p-3 pt-6 h-1/2 flex flex-col justify-between items-center gap-2 bg-gradient-to-r from-zinc-700 to-zinc-800 ">
        <h3 className="text-2xl">{title}</h3>
        <p className="text-sm">{description}</p>
        <Link to={linkTo}>
          <Button buttonSize="SMALL">{buttonText}</Button>
        </Link>
      </div>
    </div>
  )
}

export default LinkCard
