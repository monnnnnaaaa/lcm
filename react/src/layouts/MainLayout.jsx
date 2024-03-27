import { Outlet } from 'react-router-dom';

import { Sidebar } from '../components/Sidebar/Sidebar';
import '../bootstrap.css';

const MainLayout = () => {
  return (
    <div className="page-top">
      <Sidebar />
      <Outlet />
    </div>
  );
}
 
export default MainLayout;