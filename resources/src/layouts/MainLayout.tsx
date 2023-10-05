import React from 'react'
import { Outlet } from 'react-router-dom'
import Header from './Header'

const MainLayout = () => (
  <div className="min-h-screen flex flex-col">
    <Header />
    <div className="flex-grow">
      <Outlet />
    </div>
    <div>I AM FOOTER</div>
  </div>
)

export default MainLayout
