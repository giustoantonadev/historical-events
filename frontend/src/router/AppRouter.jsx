import { BrowserRouter, Routes, Route } from "react-router-dom";
import EventList from "../pages/EventList";
import EventDetails from "../pages/EventDetails";

export default function AppRouter() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<EventList />} />
        <Route path="/events/:id" element={<EventDetails />} />
      </Routes>
    </BrowserRouter>
  );
}