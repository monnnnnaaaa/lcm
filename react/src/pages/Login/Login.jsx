import { useState } from "react";

import Logo from "../../images/logo.png"
import "./Login.css";

const LoginPage = () => {
    const [error, setError] = useState("");

    return (
        <div className="login-container">
            <img src={Logo} alt="Logo" className="logo" />
            <h2>QUOTATION SYSTEM</h2>
            {error && <p className="error">{error}</p>}
            <form onSubmit={(e) => e.preventDefault()}>
                <div className="form-group">
                <label htmlFor="uname" className="label-left">
                    Username
                </label>
                <input
                    type="text"
                    id="uname"
                    name="uname"
                    placeholder="Enter your username"
                    required
                />
                </div>
                <div className="form-group">
                <label htmlFor="password" className="label-left">
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                />
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    );
};

export default LoginPage;
