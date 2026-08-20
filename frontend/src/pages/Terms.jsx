import { useTranslation } from "react-i18next";
import "../styles/about.css";

export default function Terms() {
    const { t } = useTranslation();

    return (
        <main className="about-page container">
            <h1>{t("terms.title", { defaultValue: "Terms & Privacy" })}</h1>

            <section>
                <h2>{t("terms.usageTitle", { defaultValue: "Terms of Use" })}</h2>
                <p>{t("terms.usageText", { defaultValue: "By using this site you agree to our terms of use. Content is provided for informational purposes and should not be considered professional advice." })}</p>
            </section>

            <section>
                <h2>{t("terms.privacyTitle", { defaultValue: "Privacy" })}</h2>
                <p>{t("terms.privacyText", { defaultValue: "We collect minimal data necessary to provide the service. See our privacy policy for details on data handling and your rights." })}</p>
            </section>

            <section>
                <h2>{t("terms.cookiesTitle", { defaultValue: "Cookies" })}</h2>
                <p>{t("terms.cookiesText", { defaultValue: "The site may use cookies and similar technologies for analytics and functionality. You can control cookie settings in your browser." })}</p>
            </section>
        </main>
    );
}
