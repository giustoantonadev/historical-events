import { useTranslation } from "react-i18next";
import "../styles/about.css";

export default function About() {
    const { t } = useTranslation();

    return (
        <main className="about-page container">
            <h1>{t("about.title", { defaultValue: "About" })}</h1>

            <section className="mission">
                <h2>{t("about.missionTitle", { defaultValue: "Our mission" })}</h2>
                <p>{t("about.missionText", { defaultValue: "We collect, document and present historical events and biographies with accuracy and care, making them accessible to everyone." })}</p>
            </section>

            <section className="team">
                <h2>{t("about.teamTitle", { defaultValue: "The team" })}</h2>
                <p>{t("about.teamText", { defaultValue: "A small multidisciplinary team of historians, researchers, developers and designers committed to preserving and sharing cultural heritage." })}</p>
            </section>

            <section className="about-contact">
                <h3>{t("about.contactTitle", { defaultValue: "Contact" })}</h3>
                <p>{t("about.contactText", { defaultValue: "For partnerships, press or collaboration, use the Contact page." })}</p>
            </section>
        </main>
    );
}
