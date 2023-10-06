import React from 'react';
import {useNavigate} from "react-router-dom";
import {SubmitHandler, useForm} from "react-hook-form";
import {useTypedDispatch} from "../../hooks/storeHooks";
import {login, signUp} from "../../store/reducers/AuthSlice/asyncThunks";
import Input from "../../components/Inputs/Input";
import Button from "../../components/Buttons/Button";

type SignUpForm = {
  name: string,
  email: string,
  password: string,
  password_confirmation: string
}

const SignUpPage = () => {
  const navigate = useNavigate()
  const { register, handleSubmit } = useForm<SignUpForm>()
  const dispatch = useTypedDispatch()
  const onSubmit: SubmitHandler<SignUpForm> = async (data) => {
    try {
      dispatch(signUp(data)).unwrap().then(() => navigate('/login'))
    } catch (e) {
      console.log(e)
    }
  }
  return (
    <form onSubmit={handleSubmit(onSubmit)} className="w-96 mt-12 mx-auto flex flex-col gap-3">
      <Input label="Username" {...register('name')}/>
      <Input label="Email" {...register('email')} />
      <Input label="Password" {...register('password')} type="password" />
      <Input label="Confirm password" {...register('password_confirmation')} type="password" />
      <Button type="submit">Sign up</Button>
    </form>
  )
}

export default SignUpPage;
