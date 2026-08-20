import { useState } from "react";
import { useTranslation } from "react-i18next";
import "../styles/contact.css";

export default function Support() {
    const { t } = useTranslation();
    const [email, setEmail] = useState("");
    const [note, setNote] = useState("");
    const [issueType, setIssueType] = useState("bug");
    const [priority, setPriority] = useState("medium");
    const [steps, setSteps] = useState("");
    const [attachment, setAttachment] = useState(null);
    const [sent, setSent] = useState(false);

    function handleSubmit(e) {
        e.preventDefault();
        const payload = { email, issueType, priority, note, steps, attachmentName: attachment?.name ?? null };
        console.log("Support request", payload);
        setSent(true);
        setEmail("");
        setNote("");
        setIssueType("bug");
        setPriority("medium");
        setSteps("");
        setAttachment(null);
        setTimeout(() => setSent(false), 4000);
    }

    function handleFile(e) {
        const f = e.target.files && e.target.files[0];
        setAttachment(f || null);
    }

    return (
        <main className="contact-page container">
            <h1>{t("support.title", { defaultValue: "Support" })}</h1>
            <p className="lead">{t("support.subtitle", { defaultValue: "Need help? Describe the issue and our team will respond." })}</p>

            <form className="contact-form" onSubmit={handleSubmit} aria-label="Support form">
                <label>
                    {t("support.email", { defaultValue: "Your email" })}
                    <input name="email" type="email" value={email} onChange={(e) => setEmail(e.target.value)} required />
                </label>

                <label>
                    {t("support.typeLabel", { defaultValue: "Type" })}
                    <select name="type" value={issueType} onChange={(e) => setIssueType(e.target.value)}>
                        <option value="bug">{t("support.typeOptions.bug", { defaultValue: "Bug" })}</option>
                        <option value="feature">{t("support.typeOptions.feature", { defaultValue: "Feature request" })}</option>
                        <option value="question">{t("support.typeOptions.question", { defaultValue: "Question" })}</option>
                    </select>
                </label>

                <label>
                    {t("support.priorityLabel", { defaultValue: "Priority" })}
                    <select name="priority" value={priority} onChange={(e) => setPriority(e.target.value)}>
                        <option value="low">{t("support.priorityOptions.low", { defaultValue: "Low" })}</option>
                        <option value="medium">{t("support.priorityOptions.medium", { defaultValue: "Medium" })}</option>
                        <option value="high">{t("support.priorityOptions.high", { defaultValue: "High" })}</option>
                        <option value="urgent">{t("support.priorityOptions.urgent", { defaultValue: "Urgent" })}</option>
                    </select>
                </label>

                <label>
                    {t("support.note", { defaultValue: "Describe the issue" })}
                    <textarea name="note" value={note} onChange={(e) => setNote(e.target.value)} rows={4} required />
                </label>

                <label>
                    {t("support.steps", { defaultValue: "Steps to reproduce (optional)" })}
                    <textarea name="steps" value={steps} onChange={(e) => setSteps(e.target.value)} rows={4} />
                </label>

                <label>
                    {t("support.attachment", { defaultValue: "Attach screenshot (optional)" })}
                    <input type="file" accept="image/*" onChange={handleFile} />
                    {attachment && <div className="sent-note">{attachment.name}</div>}
                </label>

                <div className="contact-actions">
                    <button type="submit" className="btn-primary">{t("support.send", { defaultValue: "Send Request" })}</button>
                    {sent && <span className="sent-note">{t("support.sent", { defaultValue: "Request sent — we'll be in touch." })}</span>}
                </div>
            </form>
        </main>
    );
}
