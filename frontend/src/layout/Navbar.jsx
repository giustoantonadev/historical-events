import { Link } from "react-router-dom";
import "../styles/navbar.css";

export default function Navbar() {
  return (
    <>
      <nav className="navbar navbar-expand-lg premium-navbar">
        <div className="container">

          {/* BRAND */}
          <Link className="navbar-brand" to="/">
            <i className="bi bi-hourglass-split brand-icon"></i>
            Archivio Storico
          </Link>

          {/* TOGGLER */}
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span className="navbar-toggler-icon"></span>
          </button>

          {/* MENU */}
          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav ms-auto">

              <li className="nav-item">
                <Link className="nav-link" to="/">
                  Eventi
                </Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/people">
                  Personaggi
                </Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/periods">
                  Periodi Storici
                </Link>
              </li>

            </ul>
          </div>

        </div>
      </nav>

      {/* DECORATIVE BAR */}
      <div className="navbar-decor"></div>
    </>
  );
}
