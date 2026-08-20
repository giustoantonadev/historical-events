import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "../layout/Layout";
import EventList from "../pages/EventList";
import EventDetail from "../pages/EventDetail";
import PersonList from "../pages/PersonList";
import PersonDetail from "../pages/PersonDetail";
import PeriodList from "../pages/PeriodList";
import PeriodDetail from "../pages/PeriodDetail";
import Contact from "../pages/Contact";
import Support from "../pages/Support";
import About from "../pages/About";
import Terms from "../pages/Terms";



export default function AppRouter() {
  return (
    <BrowserRouter>
      <Layout>
        <Routes>
          <Route path="/" element={<EventList />} />
          <Route path="/events/:id" element={<EventDetail />} />
          <Route path="/people" element={<PersonList />} />
          <Route path="/people/:id" element={<PersonDetail />} />
          <Route path="/periods" element={<PeriodList />} />
          <Route path="/periods/:id" element={<PeriodDetail />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="/support" element={<Support />} />
          <Route path="/about" element={<About />} />
          <Route path="/terms" element={<Terms />} />
          <Route path="*" element={<p>Pagina non trovata</p>} />
        </Routes>
      </Layout>
    </BrowserRouter>
  );
}
