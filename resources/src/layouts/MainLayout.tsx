import React from 'react'
import { Outlet } from 'react-router-dom'
import Header from './Header'
import Menu from "./Menu";
import Footer from "./Footer";

const MainLayout = () => (
  <div className="min-h-screen flex flex-col">
    <Header />
    <div className="flex-grow flex relative">
      <Menu />
      <div className="flex flex-col justify-between flex-grow">
        <div className="p-4"><Outlet /></div>
        <Footer />
      </div>
    </div>
  </div>
)

export default MainLayout
