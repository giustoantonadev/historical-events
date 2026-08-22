import { useState } from "react";
import { useTranslation } from "react-i18next";
import "../styles/contact.css";

export default function Contact() {
    const { t } = useTranslation();
    const [form, setForm] = useState({ name: "", email: "", message: "" });
    const [sent, setSent] = useState(false);

    function handleChange(e) {
        const { name, value } = e.target;
        setForm((s) => ({ ...s, [name]: value }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        fetch('http://localhost:8000/api/contact', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(form)
        })
            .then(res => {
                if (!res.ok) throw new Error('Network error');
                return res.json();
            })
            .then(() => {
                setSent(true);
                setForm({ name: "", email: "", message: "" });
                setTimeout(() => setSent(false), 4000);
            })
            .catch(err => {
                console.error('Failed to send contact', err);
                alert(t('contact.error', { defaultValue: 'Failed to send message' }));
            });
    }

    return (
        <main className="contact-page container">
            <h1>{t("footer.contact", { defaultValue: "Contact" })}</h1>
            <p className="lead">{t("contact.subtitle", { defaultValue: "Send us a message and we will get back to you." })}</p>

            <form className="contact-form" onSubmit={handleSubmit} aria-label="Contact form">
                <label>
                    {t("contact.form.name", { defaultValue: "Name" })}
                    <input name="name" value={form.name} onChange={handleChange} required />
                </label>

                <label>
                    {t("contact.form.email", { defaultValue: "Email" })}
                    <input name="email" type="email" value={form.email} onChange={handleChange} required />
                </label>

                <label>
                    {t("contact.form.message", { defaultValue: "Message" })}
                    <textarea name="message" value={form.message} onChange={handleChange} rows={6} required />
                </label>

                <div className="contact-actions">
                    <button type="submit" className="btn-primary">{t("contact.form.send", { defaultValue: "Send Message" })}</button>
                    {sent && <span className="sent-note">{t("contact.sent", { defaultValue: "Message sent — thank you!" })}</span>}
                </div>
            </form>
        </main>
    );
}
