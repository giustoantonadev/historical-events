import "../styles/footer.css";

export default function Footer() {
  return (
    <>
      <footer className="premium-footer">
        <div className="container text-center">

          {/* Icona */}
          <div className="footer-icon">
            <i className="bi bi-hourglass-split"></i>
          </div>

          {/* Titolo */}
          <h4 className="footer-title">Archivio Storico Digitale</h4>

          {/* Sottotitolo */}
          <p className="footer-subtitle">
            Un viaggio attraverso gli eventi e i personaggi che hanno segnato la storia.
          </p>

          {/* Linea decorativa */}
          <div className="footer-divider"></div>

          {/* Copyright */}
          <p className="footer-copy">
            © {new Date().getFullYear()} Archivio Storico — Tutti i diritti riservati
          </p>

        </div>
      </footer>

      {/* Barra decorativa inferiore */}
      <div className="footer-decor"></div>
    </>
  );
}
