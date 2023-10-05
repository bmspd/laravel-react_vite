import React, { useState } from 'react'
import axios from 'axios'
import { useTypedDispatch, useTypedSelector } from '../hooks/storeHooks'
import { selectIsAuth } from '../store/reducers/AuthSlice/selectors'
import { setAuth } from '../store/reducers/AuthSlice/AuthSlice'

const Main = () => {
  const isAuth = useTypedSelector(selectIsAuth)
  const dispatch = useTypedDispatch()
  const [name, setName] = useState('')
  const [pass, setPass] = useState('')
  const [userId, setUserId] = useState('')
  return (
    <div
      style={{
        display: 'flex',
        gap: '12px',
        flexDirection: 'column',
        alignItems: 'flex-start',
      }}
    >
      <h1>Hello ...1234</h1>
      <h2>{isAuth ? 'logged' : 'not logged'}</h2>
      <button
        type="button"
        onClick={() => {
          dispatch(setAuth(!isAuth))
        }}
      >
        Toggle login
      </button>
      <input onChange={(e) => setName(e.target.value)} placeholder="name" />
      <input onChange={(e) => setPass(e.target.value)} placeholder="pass" />
      <button
        onClick={() => axios.get('http://localhost:8000/api/auth/logout')}
      >
        LOGOUT
      </button>
      <button
        onClick={() => axios.post('http://localhost:8000/api/auth/login', {
          name,
          password: pass,
        })}
      >
        LOGIN
      </button>
      <button
        onClick={() => axios.get('http://localhost:8000/api/users?per_page=10&include[0]=role')}
      >
        GET USERS
      </button>
      <button
        onClick={() => axios.get(`http://localhost:8000/api/users/${userId}?include[0]=role`)}
      >
        GET USER BY ID
      </button>
      <input
        placeholder="user id"
        onChange={(e) => setUserId(e.target.value)}
      />
    </div>
  )
}

export default Main
