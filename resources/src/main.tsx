import { createRoot } from 'react-dom/client'
import { Provider } from 'react-redux'
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import { store } from './store/store'
import Main from './routes/Main';
import MainLayout from './layouts/MainLayout';
import './main.scss'

const router = createBrowserRouter([
  {
    element: <MainLayout />,
    children: [
      {
        path: '/',
        element: <Main />,

      },
    ],
  },
  { path: '*', element: <div>NOT FOUND 404!!!</div> },
])

const root = document.getElementById('root')
if (root) {
  createRoot(root).render(
    <Provider store={store}>
      <RouterProvider router={router} />
    </Provider>,
  )
}
