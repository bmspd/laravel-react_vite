import React from 'react'
import { Link, useNavigate } from 'react-router-dom'
import {IconUserCircle, IconLayoutSidebarLeftExpand, IconOutbound} from '@tabler/icons-react'
import Button from '../components/Buttons/Button'
import { selectIsAuth, selectUser } from '../store/reducers/AuthSlice/selectors'
import { useTypedDispatch, useTypedSelector } from '../hooks/storeHooks'
import { logout } from '../store/reducers/AuthSlice/asyncThunks'
import { resetStore } from '../store/reducers/AuthSlice/AuthSlice'
import { toggleIsMenuOpen } from '../store/reducers/InterfaceSlice/InterfaceSlice'
import Dropdown from '../components/Dropdowns/Dropdown'

const Header = () => {
  const navigate = useNavigate()
  const dispatch = useTypedDispatch()
  const isAuth = useTypedSelector(selectIsAuth)
  const user = useTypedSelector(selectUser)
  return (
    <div className="h-16 z-20 sticky top-0  bg-white/30 p-4 backdrop-blur flex justify-between items-center gap-2">
      <div className="">
        {isAuth && (
          <IconLayoutSidebarLeftExpand
            onClick={() => dispatch(toggleIsMenuOpen())}
            className="cursor-pointer"
            width="32"
            height="32"
          />
        )}
      </div>
      <div className="flex gap-4 items-center">
        {isAuth ? (
          <>
            <Dropdown
              controlProps={{title: user?.name}}
              options={[
                {
                  value: 'User profile',
                  onClick: () => navigate(`/user/${user?.id}`),
                  label: (
                    <div className="flex gap-2 items-center">
                      <IconUserCircle strokeWidth="1" width="20" />
                      User profile
                    </div>
                  ),
                },
                {
                  value: 'Log out',
                  onClick: () => {
                    dispatch(logout())
                      .unwrap()
                      .then(() => {
                        dispatch(resetStore())
                        navigate('/', { replace: true })
                      })
                  },
                  label: (
                    <div className="flex gap-2 items-center">
                      <IconOutbound strokeWidth="1" width="20" />
                      Log out
                    </div>
                  ),
                },
              ]}
            />
          </>
        ) : (
          <>
            <Link to="/login">
              <Button>Login</Button>
            </Link>
            <Link to="/sign-up">
              <Button>Sign up</Button>
            </Link>
          </>
        )}
      </div>
    </div>
  )
}

export default Header
