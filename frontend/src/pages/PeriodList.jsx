import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/periodi-storici.css";

const FALLBACK_PERIODS = [
  { id: "antichita", name: "Antichità", desc: "Civiltà classiche, miti e architetture che hanno scolpito le fondamenta del mondo.", cls: "period-card--antichita" },
  { id: "medioevo", name: "Medioevo", desc: "Fortificazioni, ordine cavalleresco e un tessuto religioso e artigianale vivo.", cls: "period-card--medioevo" },
  { id: "rinascimento", name: "Rinascimento", desc: "Rinascita delle arti e degli studi: prospettive nuove e saperi rinnovati.", cls: "period-card--rinascimento" },
  { id: "eta-moderna", name: "Età Moderna", desc: "Scoperte, rivoluzioni e la costruzione delle moderne istituzioni politiche.", cls: "period-card--eta-moderna" },
  { id: "contemporanea", name: "Età Contemporanea", desc: "Globalizzazione, innovazione tecnologica e pluralità di narrazioni.", cls: "period-card--eta-contemporanea" },
];

function detectClassFromItem(item, name = "", index = -1) {
  // Prefer stable, non-localized identifiers (slug/key/code/id) when available.
  const stable = (item.slug || item.key || item.code || (item.id && item.id.toString()) || "").toString().toLowerCase();

  const MAP = {
    'antichita': 'period-card--antichita',
    'antichità': 'period-card--antichita',
    'antiquity': 'period-card--antichita',
    'ancien': 'period-card--antichita',

    'medioevo': 'period-card--medioevo',
    'medieval': 'period-card--medioevo',
    'middle-ages': 'period-card--medioevo',

    'rinascimento': 'period-card--rinascimento',
    'renaissance': 'period-card--rinascimento',

    'eta-moderna': 'period-card--eta-moderna',
    'età-moderna': 'period-card--eta-moderna',
    'modern': 'period-card--eta-moderna',

    'contemporanea': 'period-card--eta-contemporanea',
    'contemporary': 'period-card--eta-contemporanea'
  };

  // Check stable keys first
  for (const k in MAP) {
    if (stable.includes(k)) return MAP[k];
  }

  // Then try localized name heuristics
  const lname = (name || '').toString().toLowerCase();
  for (const k in MAP) {
    if (lname.includes(k)) return MAP[k];
  }

  // Fallback to index-based mapping to keep order consistent if API returns locales in different orders
  const INDEX_MAP = ['period-card--antichita', 'period-card--medioevo', 'period-card--rinascimento', 'period-card--eta-moderna', 'period-card--eta-contemporanea'];
  if (typeof index === 'number' && index >= 0) return INDEX_MAP[Math.min(index, INDEX_MAP.length - 1)];

  // Default
  return 'period-card--eta-contemporanea';
}

export default function PeriodList() {
  const [periods, setPeriods] = useState(FALLBACK_PERIODS);
  const { i18n, t } = useTranslation();
  const lang = (i18n.language || 'it').split('-')[0];

  useEffect(() => {
    const ac = new AbortController();
    let mounted = true;

    fetch(`http://localhost:8000/api/periods?lang=${lang}`, { signal: ac.signal })
      .then(res => {
        if (!res.ok) throw new Error('Network error');
        return res.json();
      })
      .then(data => {
        if (!mounted) return;
        if (Array.isArray(data) && data.length) {
          const mapped = data.map((item, idx) => {
            const name = item[`name_${lang}`] || item.name || item.title || '';
            const desc = item[`description_${lang}`] || item.description || item.excerpt || '';
            const cls = detectClassFromItem(item, name, idx);
            return { id: item.id, name, desc, cls };
          });
          setPeriods(mapped);
        } else {
          setPeriods(FALLBACK_PERIODS);
        }
      })
      .catch(err => {
        if (err.name !== 'AbortError') setPeriods(FALLBACK_PERIODS);
      });

    return () => { mounted = false; ac.abort(); };
  }, [lang]);

  return (
    <div className="pe-container">
      <header className="pe-hero" aria-labelledby="page-title">
        <p className="pe-hero-sub">{t('periods.museumLabel', 'Sezione museale · Percorso cronologico')}</p>
        <h1 id="page-title" className="pe-hero-title">{t('sections.periods', 'Periodi Storici')}</h1>
        <p className="pe-hero-evoke">{t('periods.evoke', 'Un percorso visivo che raccoglie gesti, forme e trasformazioni del tempo.')}</p>
      </header>

      <section className="pe-grid" aria-label={t('periods.listLabel', 'Elenco dei periodi storici')}>
        {periods.map(p => (
          <article key={p.id} className={`period-card ${p.cls}`} aria-labelledby={`${p.id}-title`}>
            <div className="period-head">
              <div className="period-icon" aria-hidden="true">
                {p.cls.includes('antichita') && (
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12c3-6 9-8 10-8 1 0 7 2 10 8-3 6-9 8-10 8S5 18 2 12z"></path><path d="M4.8 8.2c1.8-1.2 3.6-0.9 4.6 0"></path><path d="M19.2 8.2c-1.8-1.2-3.6-0.9-4.6 0"></path></svg>
                )}
                {p.cls.includes('medioevo') && (
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21v-10l3-2V5l3 2v2h6V7l3-2v4l3 2v10H3z"></path></svg>
                )}
                {p.cls.includes('rinascimento') && (
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21s6-6 10-10c2-2 6-6 8-6 1 0 2 1 1 2s-4 6-6 8C13 15 9 21 9 21H3z"></path></svg>
                )}
                {p.cls.includes('eta-moderna') && (
                  <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M12 2v2M12 20v2M4 12H2M22 12h-2M5 5l-1.5-1.5M19 19l1.5 1.5M19 5l1.5-1.5M5 19l-1.5 1.5"></path></svg>
                )}
                {p.cls.includes('eta-contemporanea') && (
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12c2-6 10-10 20-10"></path><path d="M2 12c2 6 10 10 20 10"></path><circle cx="12" cy="12" r="3"></circle></svg>
                )}
              </div>

              <div className="period-meta">
                <div className="period-era">{p.name}</div>
                <h2 id={`${p.id}-title`} className="period-name">{p.name}</h2>
              </div>
            </div>

            <p className="period-desc">{p.desc}</p>

            <div className="card-actions">
              <Link className="cta" to={`/periods/${p.id}`} aria-label={t('periods.detailsAria', `Dettagli ${p.name}`)}>{t('event.details', 'Dettagli →')}</Link>
            </div>
          </article>
        ))}
      </section>

      <nav className="pe-timeline" aria-label={t('periods.timelineAria', 'Timeline dei periodi storici')}>
        {periods.map(p => (
          <div key={p.id} className="timeline-point" aria-hidden="true">
            <div className="timeline-dot" />
            <div className="timeline-label">{p.name}</div>
          </div>
        ))}
      </nav>
    </div>
  );
}
