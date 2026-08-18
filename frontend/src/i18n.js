import i18n from "i18next";
import { initReactI18next } from "react-i18next";

import it from "./locales/it/translation.json";
import en from "./locales/en/translation.json";
import fr from "./locales/fr/translation.json";

i18n
  .use(initReactI18next)
  .init({
    resources: {
      it: { translation: it },
      en: { translation: en },
      fr: { translation: fr }
    },
    lng: "it", // lingua iniziale
    fallbackLng: "it",
    interpolation: {
      escapeValue: false
    }
  });

export default i18n;
