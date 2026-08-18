import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "../layout/Layout";
import EventList from "../pages/EventList";
import EventDetail from "../pages/EventDetail";

export default function AppRouter() {
  return (
    <BrowserRouter>
      <Layout>
        <Routes>
          <Route path="/" element={<EventList />} />
          <Route path="/events/:id" element={<EventDetail />} />
        </Routes>
      </Layout>
    </BrowserRouter>
  );
}
