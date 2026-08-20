import "../styles/footer.css";
import { useTranslation } from "react-i18next";

export default function Footer() {
  const { t } = useTranslation();
  return (
    <>
      <footer className="premium-footer">
        <div className="container">
          {/** i18n */}
          {/** translation hook */}

          <div className="footer-grid">

            {/* LEFT: links */}
            <div className="footer-col footer-links">
              <h4 className="footer-title">{t('footer.title', { defaultValue: 'Archivio Storico Digitale' })}</h4>
              <p className="footer-subtitle">{t('footer.subtitle', { defaultValue: 'Un viaggio attraverso gli eventi e i personaggi che hanno segnato la storia.' })}</p>
              <ul className="footer-nav">
                <li><a href="/contact">{t('footer.contact', { defaultValue: 'Contatti' })}</a></li>
                <li><a href="/support">{t('footer.support', { defaultValue: 'Supporto' })}</a></li>
                <li><a href="/about">{t('footer.about', { defaultValue: 'Chi siamo' })}</a></li>
                <li><a href="/terms">{t('footer.terms', { defaultValue: 'Termini & Privacy' })}</a></li>
              </ul>
            </div>

            {/* RIGHT: social */}
            <div className="footer-col footer-social">
              <h4 className="footer-title">{t('footer.followUs', { defaultValue: 'Seguici' })}</h4>
              <p className="footer-subtitle">{t('footer.followSubtitle', { defaultValue: 'Resta aggiornato sui nostri canali' })}</p>
              <div className="social-list">
                <a href="https://x.com" aria-label="X" className="social-btn x" target="_blank" rel="noopener noreferrer"><span className="social-initial">X</span></a>
                <a href="https://facebook.com" aria-label="Facebook" className="social-btn facebook" target="_blank" rel="noopener noreferrer"><span className="social-initial">FB</span></a>
                <a href="https://instagram.com" aria-label="Instagram" className="social-btn instagram" target="_blank" rel="noopener noreferrer"><span className="social-initial">IG</span></a>
                <a href="https://youtube.com" aria-label="YouTube" className="social-btn youtube" target="_blank" rel="noopener noreferrer"><span className="social-initial">YT</span></a>
              </div>
            </div>

          </div>

          <div className="footer-bottom">
            <div className="footer-divider"></div>
            <p className="footer-copy">{t('footer.copyright', { year: new Date().getFullYear(), defaultValue: `© ${new Date().getFullYear()} Archivio Storico — Tutti i diritti riservati` })}</p>
          </div>

        </div>
      </footer>

      {/* Barra decorativa inferiore */}
      <div className="footer-decor"></div>
    </>
  );
}
