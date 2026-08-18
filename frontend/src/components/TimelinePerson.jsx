import { Link } from "react-router-dom";
import "../styles/timeline.css";

export default function TimelinePerson({ person }) {
  return (
    <Link to={`/people/${person.id}`} className="timeline-person">
      {person.portrait && (
        <img
          src={`http://localhost:8000/storage/${person.portrait}`}
          alt={person.name}
          className="timeline-person-img"
        />
      )}
      <span>{person.name}</span>
    </Link>
  );
}
