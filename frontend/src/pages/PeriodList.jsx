import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/periodlist.css";

export default function PeriodList() {
  const [periods, setPeriods] = useState([]);
  const { i18n, t } = useTranslation();
  const lang = (i18n.language || 'it').split('-')[0]; // normalize e.g. en-US -> en

  useEffect(() => {
    fetch(`http://localhost:8000/api/periods?lang=${lang}`)
      .then(res => res.json())
      .then(data => setPeriods(data));
  }, [lang]);

  return (
    <div className="container periodlist-wrapper">

      {/* TITOLO PAGINA */}
      <h1 className="periodlist-title">{t("sections.periods")}</h1>
      <p className="periodlist-subtitle">{t("periods.subtitle")}</p>

      {/* GRID PERIODI */}
      <div className="row g-4">
        {periods.map(period => (
          <div key={period.id} className="col-md-6 col-lg-4">

            <div className="period-card">

              {/* Icona */}
              <div className="period-icon">
                <i className="bi bi-hourglass-split"></i>
              </div>

              {/* Nome multilingua con fallback */}
              <h4 className="period-name">
                {period[`name_${lang}`] || period.name}
              </h4>

              {/* Pulsante */}
              <Link
                to={`/periods/${period.id}`}
                className="period-btn"
              >
                {t("event.details")}
              </Link>

            </div>

          </div>
        ))}
      </div>
    </div>
  );
}
