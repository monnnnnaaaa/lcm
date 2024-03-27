import { createBrowserRouter } from "react-router-dom";

import MainLayout from "./layouts/MainLayout";
import LoginPage from "./pages/Login/Login";
import DashboardPage from "./pages/Dashboard/DashboardPage";

const router = createBrowserRouter([
  {
    path: "/",
    element: <MainLayout />,
    children: [
      {
        path: "dashboard",
        element: <DashboardPage />
      }
    ]
  },
  {
    path: "/login",
    element: <LoginPage />
  },
]);

export default router;