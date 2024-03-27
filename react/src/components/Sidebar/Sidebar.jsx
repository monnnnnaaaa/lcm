import { Link } from "react-router-dom";

import "../../bootstrap.css";

export const Sidebar = () => {
  return (
    <div id="wrapper">
      <ul
        className="navbar-nav sidebar sidebar-dark accordion overflow-y"
        id="accordionSidebar"
      >
        <Link
          to="/"
          className="sidebar-brand d-flex align-items-center justify-content-center"
        >
          <div className="sidebar-brand-text mx-3">LCM QUOTATION</div>
        </Link>

        <hr className="sidebar-divider my-0" />
        <li className="nav-item">
          <Link to="/dashboard" className="nav-link">
            <i className="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </Link>
        </li>

        <li className="nav-item">
          <Link to="/quotation" className="nav-link">
            <i className="fas fa-fw fa-quote-left"></i>
            <span>Quotation</span>
          </Link>
        </li>

        <li className="nav-item ">
          <Link to="/products" className="nav-link">
            <i className="fas fa-fw fa-toolbox"></i>
            <span>Product</span>
          </Link>
        </li>

        <li className="nav-item">
          <Link to="/customer" className="nav-link">
            <i className="fas fa-fw fa-users"></i>
            <span>Customer</span>
          </Link>
        </li>

        <li className="nav-item">
          <Link to="/user" className="nav-link">
            <i className="fas fa-fw fa-user"></i>
            <span>User</span>
          </Link>
        </li>

        <Link to="/logout" className="logout-btn ml-3">
          Logout
        </Link>
      </ul>

      <div id="content-wrapper" className="d-flex flex-column">
        <div id="content">
          <nav className="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button
              id="sidebarToggleTop"
              className="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i className="fa fa-bars"></i>
            </button>
            <form className="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"></form>

            <ul className="navbar-nav ml-auto bg-white"></ul>
          </nav>
        </div>
      </div>
    </div>
  );
};
