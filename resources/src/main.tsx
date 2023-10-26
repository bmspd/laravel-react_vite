import { createRoot } from 'react-dom/client'
import { Provider } from 'react-redux'
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import { store } from './store/store'
import Main from './routes/Main/Main';
import MainLayout from './layouts/MainLayout';
import './main.scss'
import AuthLayout from './layouts/AuthLayout';
import LoginPage from './routes/Login/LoginPage';
import SignUpPage from './routes/SignUp/SignUpPage';
import GetUserInfoLayout from "./layouts/GetUserInfoLayout";
import ContentsPage from "./routes/Contents/ContentsPage";


const router = createBrowserRouter([
  {
    element: <MainLayout />,
    children: [
      {
        path: '/',
        element: <Main />,

      },
      {
        path: '/login',
        element: <LoginPage />,
      },
      {
        path: '/sign-up',
        element: <SignUpPage />,
      },
      {
        element: <AuthLayout />,
        children: [
          {
            path: '/contents',
            element: <ContentsPage />
          },
        ],
      },
    ],
  },
  { path: '*', element: <div>NOT FOUND 404!!!</div> },
])

const root = document.getElementById('root')
if (root) {
  createRoot(root).render(
    <Provider store={store}>
      <GetUserInfoLayout>
        <RouterProvider router={router} />
      </GetUserInfoLayout>
    </Provider>,
  )
}
