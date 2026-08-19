import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/navbar.css";

export default function Navbar() {
  const { t, i18n } = useTranslation();

  return (
    <>
      <nav className="navbar navbar-expand-lg premium-navbar">
        <div className="container">

          <Link className="navbar-brand" to="/">
            {t("home.title")}
          </Link>


          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span className="navbar-toggler-icon"></span>
          </button>

          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav ms-auto">

              <li className="nav-item">
                <Link className="nav-link" to="/">
                  {t("navbar.events")}
                </Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/people">
                  {t("navbar.people")}
                </Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/periods">
                  {t("navbar.periods")}
                </Link>
              </li>

              {/* SWITCH LINGUA */}
              <div className="lang-switcher">

                <button
                  className={`lang-btn ${i18n.language === "it" ? "active" : ""}`}
                  onClick={() => i18n.changeLanguage("it")}
                >
                  <span className="fi fi-it"></span>
                  IT
                </button>

                <button
                  className={`lang-btn ${i18n.language === "en" ? "active" : ""}`}
                  onClick={() => i18n.changeLanguage("en")}
                >
                  <span className="fi fi-gb"></span>
                  EN
                </button>

                <button
                  className={`lang-btn ${i18n.language === "fr" ? "active" : ""}`}
                  onClick={() => i18n.changeLanguage("fr")}
                >
                  <span className="fi fi-fr"></span>
                  FR
                </button>

              </div>

            </ul>
          </div>

        </div>
      </nav>

      <div className="navbar-decor"></div>
    </>
  );
}
