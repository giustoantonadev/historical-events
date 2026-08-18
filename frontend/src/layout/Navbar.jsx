export default function Navbar() {
  return (
    <nav className="navbar navbar-expand-lg parchment-navbar shadow-sm">

      <div className="container-fluid px-4">

        {/* BRAND */}
        <a className="navbar-brand d-flex align-items-center fw-bold fs-2 parchment-title" href="/">
          <i className="bi bi-book me-2 fs-2"></i>
          Historical Events
        </a>

        {/* TOGGLER */}
        <button
          className="navbar-toggler parchment-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navMenu"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        {/* MENU */}
        <div className="collapse navbar-collapse" id="navMenu">
          <ul className="navbar-nav ms-auto fs-5 parchment-links">
            <li className="nav-item">
              <a className="nav-link parchment-link" href="/">Eventi</a>
            </li>
          </ul>
        </div>

      </div>

      {/* DECORATIVE BORDER */}
      <div className="parchment-border"></div>
    </nav>
  );
}
