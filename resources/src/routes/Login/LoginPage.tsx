import React from 'react'
import {SubmitHandler, useForm} from 'react-hook-form'

import Input from '../../components/Inputs/Input'
import Button from "../../components/Buttons/Button";
import {Services} from "../../http/services";
import {useTypedDispatch} from "../../hooks/storeHooks";
import {login} from "../../store/reducers/AuthSlice/asyncThunks";
import {useNavigate} from "react-router-dom";

interface ILoginForm {
  name: string
  password: string
}

const LoginPage = () => {
  const navigate = useNavigate()
  const { register, handleSubmit } = useForm<ILoginForm>()
  const dispatch = useTypedDispatch()
  const onSubmit: SubmitHandler<ILoginForm> = async (data) => {
    try {
      await dispatch(login(data)).unwrap()
      navigate('/')
    } catch (e) {
      console.log(e)
    }
  }
  return (
    <form onSubmit={handleSubmit(onSubmit)} className="w-96 mt-12 mx-auto flex flex-col gap-3">
      <Input label="Username" {...register('name')}/>
      <Input label="Password" {...register('password')} type="password" />
      <Button type="submit">Log in</Button>
    </form>
  )
}

export default LoginPage
