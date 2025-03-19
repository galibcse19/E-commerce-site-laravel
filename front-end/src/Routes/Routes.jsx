import {
    createBrowserRouter,
  } from "react-router-dom";
import Main from "../Layout/Main";
import ErrorPage from "../Pages/ErrorPage";
import Home from "../Pages/Home/Home";
import Login from "../Pages/Login/Login";
import SignUp from "../Pages/SignUp/SignUp";
import HelpSupport from "../Pages/HelpSupport/HelpSupport";
import ProductByCategory from "../Pages/ProductByCategory/ProductByCategory";
 

  export const router = createBrowserRouter([
    {
      path: "/",
      element: <Main></Main>,
      errorElement:<ErrorPage></ErrorPage>,
      children:[
        {
            path:'/',
            element:<Home></Home>
        },
        {
          path:'/logIn',
          element:<Login></Login>
        },
        {
          path:'/signUp',
          element:<SignUp></SignUp>
        },
        {
          path:'/helpSupport',
          element:<HelpSupport></HelpSupport>
        },
        {
          path:'/productByCategory',
          element:<ProductByCategory></ProductByCategory>
        }
      ]
    },
  ]);
  