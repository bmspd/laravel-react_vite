import React from 'react';
import { Navigate, Outlet } from 'react-router-dom';
import {useTypedSelector} from "../hooks/storeHooks";
import {selectIsAuth} from "../store/reducers/AuthSlice/selectors";

const AuthLayout = () => {
  const isAuth = useTypedSelector(selectIsAuth)
  if (!isAuth) return <Navigate to="/login" replace />
  return <Outlet />
};

export default AuthLayout;
