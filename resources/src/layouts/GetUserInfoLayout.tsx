import React, { useEffect, useState } from 'react'
import { useTypedDispatch } from '../hooks/storeHooks'
import { getCookies, whoAmI } from '../store/reducers/AuthSlice/asyncThunks'

const GetUserInfoLayout: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const dispatch = useTypedDispatch()
  const [loaded, setLoaded] = useState(false)
  useEffect(() => {
    dispatch(whoAmI())
      .unwrap()
      .catch(() => dispatch(getCookies()))
      .finally(() => setLoaded(true))
  }, [])
  if (!loaded) return null
  return children
}

export default GetUserInfoLayout
