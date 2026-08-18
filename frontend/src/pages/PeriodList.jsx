import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/periodlist.css";

export default function PeriodList() {
  const [periods, setPeriods] = useState([]);
  const { t } = useTranslation();

  useEffect(() => {
    fetch("http://localhost:8000/api/periods")
      .then(res => res.json())
      .then(data => setPeriods(data));
  }, []);

  return (
    <div className="container periodlist-wrapper">

      {/* HEADER */}
      <h1 className="periodlist-title">{t("sections.periods")}</h1>
      <p className="periodlist-subtitle">
        {t("periods.subtitle")}
      </p>

      {/* GRID */}
      <div className="row g-4">
        {periods.map(period => (
          <div key={period.id} className="col-md-6 col-lg-4">

            <div className="period-card">

              {/* Icona */}
              <div className="period-icon">
                <i className="bi bi-hourglass-split"></i>
              </div>

              {/* Nome */}
              <h4 className="period-name">{period.name}</h4>

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
