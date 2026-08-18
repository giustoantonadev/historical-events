import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "../layout/Layout";
import EventList from "../pages/EventList";
import EventDetail from "../pages/EventDetail";
import PersonList from "../pages/PersonList";
import PersonDetail from "../pages/PersonDetail";



export default function AppRouter() {
  return (
    <BrowserRouter>
      <Layout>
        <Routes>
          <Route path="/" element={<EventList />} />
          <Route path="/events/:id" element={<EventDetail />} />
          <Route path="/people" element={<PersonList />} />
          <Route path="/people/:id" element={<PersonDetail />} />
          <Route path="*" element={<p>Pagina non trovata</p>} />
        </Routes>
      </Layout>
    </BrowserRouter>
  );
}
