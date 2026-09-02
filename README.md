# 🏛️ Historical Events

Historical Events is a **Full Stack Web Application** designed to explore and manage historical events, historical periods, and important historical figures.

The project combines a **Laravel backend** with a **React frontend**, communicating through a REST API.

It includes a public interface for exploring historical content and a Laravel administration back-office for managing the application's data.

---
 
## ⚙️ Prerequisites

- PHP 8.0+ and Composer (backend)
- MySQL (or compatible) database
- Node.js 16+ and npm (frontend)
- Git

## 🚀 Quick Start

Follow these steps to run the backend and frontend locally.

### Backend (Laravel)

```bash
cd backend
composer install
cp .env.example .env
# edit .env to set DB_*, APP_URL and other values
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve --host=127.0.0.1 --port=8000
```

### Frontend (React / Vite)

```bash
cd frontend
npm install
# set API_BASE (see below) then:
npm run dev
```

By default set `API_BASE` to `http://127.0.0.1:8000` (or the `APP_URL` used by Laravel).

## 🔧 Environment variables

- Backend: copy `.env.example` and set DB_*, `APP_URL`, mail and queue settings as needed.
- Frontend: set `API_BASE` to point at the running Laravel API (for example `http://127.0.0.1:8000`).

## 🧪 Tests

Backend tests:

```bash
cd backend
composer install
php artisan test
```

Frontend tests (if present):

```bash
cd frontend
npm run test
```

## 🔐 Admin access

If seeders create an admin user, the credentials are typically documented in `database/seeders` or shown during seeding; otherwise create an admin account via the admin UI or `php artisan tinker`.

## 🔎 Quick API example

List events (language parameter supported):

```bash
curl "http://127.0.0.1:8000/api/events?lang=en"
```

## 🤝 Contributing & License

Contributions welcome — open an issue or a pull request. Add tests for new features and follow the existing code style.

Add a `LICENSE` file or specify the project license here.

## 📖 About the Project

Historical Events allows users to explore history through:

- Historical events
- Historical periods
- Historical people
- Event descriptions
- Historical images
- Relationships between events and people
- Multilingual content

The application is divided into two main parts:

### 🌍 Public Frontend

The public interface is built with **React**.

Users can:

- Browse historical events
- Filter events by historical era
- View event details
- Discover people connected to each event
- View information about historical figures
- Open historical person profiles
- View biographies and images
- Change the application language

### 🔐 Administration Back-office

The administration area is built with **Laravel Blade**.

Authenticated users can manage the application's historical content through CRUD operations.

Administrators can:

- Create historical events
- View historical events
- Edit historical events
- Delete historical events
- Manage historical periods
- Manage historical people
- Associate people with historical events
- Upload and manage images
- Manage their user profile
- Change their password
- Delete their account

---

# ✨ Main Features

## 📜 Historical Events

Each historical event can contain:

- Title
- Year
- Description
- Image
- Historical period
- Associated historical people

Events are retrieved by the React frontend through the Laravel REST API.

### Get all events

```http
GET /api/events
```

### Get a single event

```http
GET /api/events/{id}
```

The API also supports language selection:

```http
GET /api/events?lang=it
```

```http
GET /api/events?lang=en
```

For a specific event:

```http
GET /api/events/{id}?lang=it
```

---

## 👤 Historical People

Historical people can be associated with multiple historical events.

Each person can contain:

- Name
- Birth year
- Biography
- Image
- Related historical events

The relationship between historical events and historical people is implemented as a **many-to-many relationship**.

The pivot table is:

```text
event_person
```

The relationship can be represented as:

```text
historical_events
        ↕
   event_person
        ↕
historical_people
```

A unique constraint on:

```text
historical_event_id + historical_person_id
```

prevents the same person from being associated with the same event more than once.

---

## 🏺 Historical Periods

Historical events are organized into historical periods.

Examples include:

- Antiquity
- Middle Ages
- Renaissance
- Modern Age
- Contemporary Age

The relationship between periods and events is **one-to-many**:

```text
Historical Period
       │
       │ 1 : N
       ▼
Historical Events
```

A historical period can contain multiple historical events.

Each historical event belongs to one historical period.

---

## 🔎 Event Filtering

The React frontend allows users to filter historical events by historical era.

Available filters include:

- All
- Antiquity
- Middle Ages
- Modern Age
- Contemporary Age

The filtering is handled dynamically in React without reloading the page.

---

## 🌍 Multilanguage Support

Historical Events supports multilingual content.

The React frontend uses:

- `i18next`
- `react-i18next`

The selected language is detected in React:

```javascript
const lang = (i18n.language || 'it').split('-')[0];
```

The language is then sent to the Laravel API:

```javascript
fetch(`${API_BASE}/api/events?lang=${lang}`)
```

For a specific event:

```javascript
fetch(`${API_BASE}/api/events/${id}?lang=${lang}`)
```

This allows the Laravel backend to return content in the selected language.

---

## 🖼️ Image Management

Images are managed using **Laravel Storage**.

Public files are stored inside:

```text
storage/app/public/
```

For example, event images are stored inside:

```text
storage/app/public/events/
```

An image can therefore be saved in the database as:

```text
events/fondazione-roma.jpg
```

and accessed publicly through:

```text
/storage/events/fondazione-roma.jpg
```

The Laravel symbolic link can be created with:

```bash
php artisan storage:link
```

This connects:

```text
public/storage
```

to:

```text
storage/app/public
```

---

# 🛠️ Technologies Used

## Backend

- PHP
- Laravel
- MySQL
- Eloquent ORM
- Laravel Blade
- Laravel Migrations
- Laravel Seeders
- REST API

## Frontend

- React
- JavaScript
- Vite
- React Router
- React Hooks
- Fetch API
- i18next
- react-i18next

## Styling

- Bootstrap
- Bootstrap Icons
- Custom CSS

## Development Tools

- Git
- GitHub
- Composer
- npm
- Vite
- Visual Studio Code

---

# 🏗️ Application Architecture

The project follows a separated frontend/backend architecture.

```text
┌──────────────────────────┐
│      React Frontend      │
│                          │
│  Event List              │
│  Event Detail            │
│  Person Profiles         │
│  Filters                 │
│  Translations            │
└────────────┬─────────────┘
             │
             │ HTTP / JSON
             │ REST API
             ▼
┌──────────────────────────┐
│      Laravel Backend     │
│                          │
│  API Routes              │
│  Controllers             │
│  Models                  │
│  Eloquent ORM            │
│  Authentication          │
└────────────┬─────────────┘
             │
             ▼
┌──────────────────────────┐
│          MySQL           │
│                          │
│  Historical Events       │
│  Historical People       │
│  Historical Periods      │
│  Users                   │
│  Pivot Tables            │
└──────────────────────────┘
```

Laravel Blade is also used to provide the administrative back-office:

```text
                 ┌─────────────────────┐
                 │       Laravel       │
                 │                     │
                 │   Authentication    │
                 └──────────┬──────────┘
                            │
                            ▼
                 ┌─────────────────────┐
                 │  Blade Back-office  │
                 │                     │
                 │  Events CRUD        │
                 │  Periods CRUD       │
                 │  People CRUD        │
                 │  User Profile       │
                 └─────────────────────┘
```

---

# 🗄️ Database Structure

The main database entities are:

```text
users

periods

historical_events

historical_people

event_person
```

---

## Period → Historical Events

A period can contain many events.

```text
Period
   │
   │ hasMany
   ▼
Historical Events
```

In Laravel this is a **one-to-many relationship**.

---

## Historical Event → Period

Each historical event belongs to a period.

```text
Historical Event
       │
       │ belongsTo
       ▼
     Period
```

---

## Historical Events ↔ Historical People

Historical events and historical people have a **many-to-many relationship**.

```text
Historical Events
        │
        │ belongsToMany
        ▼
   ┌──────────────┐
   │ event_person │
   └──────────────┘
        ▲
        │ belongsToMany
        │
Historical People
```

The `event_person` pivot table contains:

```text
id
historical_event_id
historical_person_id
created_at
updated_at
```

The combination:

```text
historical_event_id
historical_person_id
```

is unique, preventing duplicate relationships.

---

# 🔌 REST API

The React frontend communicates with Laravel through API routes.

Examples:

### All historical events

```http
GET /api/events
```

### Historical events in Italian

```http
GET /api/events?lang=it
```

### Historical events in English

```http
GET /api/events?lang=en
```

### Single historical event

```http
GET /api/events/{id}
```

### Single event with selected language

```http
GET /api/events/{id}?lang=it
```

The API returns data in **JSON format**.

---

# ⚛️ React Frontend

The public frontend is built using functional React components.

The application uses React concepts such as:

- Components
- Props
- State
- Effects
- References
- Conditional rendering
- Array mapping
- Array filtering
- Dynamic routes
- API requests
- Environment variables

---

## React Hooks

The project uses hooks including:

### `useState`

Used to manage component state.

Example:

```javascript
const [events, setEvents] = useState([]);
const [loading, setLoading] = useState(false);
const [error, setError] = useState(null);
```

### `useEffect`

Used to perform API requests and other side effects.

Example:

```javascript
useEffect(() => {

    fetch(`${API_BASE}/api/events?lang=${lang}`)
        .then(res => res.json())
        .then(data => setEvents(data));

}, [lang]);
```

### `useRef`

Used for direct references to DOM elements, for example for visual effects such as the hero parallax effect.

```javascript
const heroRef = useRef(null);
```

---

# 🧭 React Router

React Router is used to navigate between pages without reloading the application.

For example, a single event can be accessed through a dynamic route containing its ID.

Inside the event detail component:

```javascript
const { id } = useParams();
```

The ID is then used to request the correct event:

```javascript
fetch(`${API_BASE}/api/events/${id}?lang=${lang}`)
```

---

# ⚙️ API Configuration

The React application uses a centralized API base URL.

Example:

```javascript
export const API_BASE = (
    import.meta.env.VITE_API_URL || 'http://localhost:8000'
).replace(/\/$/, '');
```

Components can import it with:

```javascript
import { API_BASE } from "../api/api";
```

and use it for API requests:

```javascript
fetch(`${API_BASE}/api/events`)
```

or images:

```javascript
`${API_BASE}/storage/${event.image}`
```

This prevents the backend URL from being hardcoded in multiple components.

---

# 🔐 Authentication

The Laravel back-office includes user authentication.

Authenticated users can access administrative functionality.

The profile area allows users to:

- View their profile
- Update their name
- Update their email
- Change their password
- Delete their account

Laravel's built-in security features are used, including:

- Authentication middleware
- Password hashing
- Form validation
- CSRF protection

---

# 🛡️ CSRF Protection

Laravel forms use CSRF protection.

Example:

```blade
@csrf
```

For HTTP methods such as `DELETE`, `PATCH`, and `PUT`, Laravel method spoofing is used.

Example:

```blade
@method('DELETE')
```

```blade
@method('PATCH')
```

```blade
@method('PUT')
```

---

# ✏️ CRUD Operations

The Laravel administration area implements CRUD operations.

CRUD stands for:

```text
Create
Read
Update
Delete
```

For example, historical periods can be:

```text
Create  → Add a new historical period

Read    → View historical periods

Update  → Edit an existing period

Delete  → Remove a historical period
```

The same architecture is used for the main historical content managed by the application.

---

# 📂 Project Structure

A simplified project structure looks like this:

```text
historical-events/
│
├── app/
│   │
│   ├── Http/
│   │   └── Controllers/
│   │
│   └── Models/
│
├── database/
│   │
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   │
│   └── views/
│       │
│       ├── events/
│       ├── periods/
│       ├── people/
│       ├── profile/
│       │
│       └── layouts/
│
├── routes/
│   │
│   ├── web.php
│   └── api.php
│
├── storage/
│   │
│   └── app/
│       └── public/
│           └── events/
│
├── public/
│
├── frontend/
│   │
│   └── src/
│       │
│       ├── api/
│       ├── components/
│       ├── pages/
│       └── styles/
│
├── .env.example
│
├── composer.json
│
└── README.md
```

The exact frontend folder name may vary depending on the local project configuration.

---

# 🚀 Installation

## Requirements

Before installing the project, make sure you have:

- PHP
- Composer
- MySQL
- Node.js
- npm
- Git

installed on your computer.

---

## 1. Clone the Repository

Clone the repository:

```bash
git clone <repository-url>
```

Enter the project folder:

```bash
cd historical-events
```

---

# ⚙️ Backend Installation

## 2. Install PHP Dependencies

Run:

```bash
composer install
```

---

## 3. Create the Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

On Windows, you can also manually copy:

```text
.env.example
```

and rename the copy to:

```text
.env
```

---

## 4. Generate Laravel Application Key

Run:

```bash
php artisan key:generate
```

---

## 5. Configure the Database

Create a MySQL database for the project.

Then configure the `.env` file.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=historical_events
DB_USERNAME=root
DB_PASSWORD=
```

Change these values according to your local MySQL configuration.

---

## 6. Run Migrations

Create the database tables with:

```bash
php artisan migrate
```

To run migrations and seed the database:

```bash
php artisan migrate --seed
```

To completely rebuild and repopulate the database:

```bash
php artisan migrate:fresh --seed
```

> ⚠️ `migrate:fresh` deletes all existing database tables and data before recreating them.

---

## 7. Create the Storage Link

Run:

```bash
php artisan storage:link
```

This makes files stored in:

```text
storage/app/public
```

available through:

```text
public/storage
```

---

## 8. Start the Laravel Server

Run:

```bash
php artisan serve
```

By default Laravel will be available at:

```text
http://localhost:8000
```

or:

```text
http://127.0.0.1:8000
```

---

# ⚛️ Frontend Installation

Move into the React frontend directory if the frontend is stored in a separate folder:

```bash
cd frontend
```

Install the JavaScript dependencies:

```bash
npm install
```

---

## Configure the API URL

Create or configure the frontend `.env` file:

```env
VITE_API_URL=http://localhost:8000
```

The application can then access this value using:

```javascript
import.meta.env.VITE_API_URL
```

---

## Start the React Development Server

Run:

```bash
npm run dev
```

Vite will display the local URL where the frontend is running.

---

# 🌱 Database Seeders

The project uses Laravel seeders to populate the database with historical content.

Seeders can contain:

- Historical periods
- Historical events
- Historical people
- Relationships between events and people
- Image paths
- Multilingual descriptions

Run the seeders with:

```bash
php artisan db:seed
```

or together with migrations:

```bash
php artisan migrate:fresh --seed
```

---

# 🖼️ Event Images

Event images are stored inside:

```text
storage/app/public/events/
```

For example:

```text
storage/app/public/events/fondazione-roma.jpg
```

The database stores:

```text
events/fondazione-roma.jpg
```

Laravel Blade can display the image using:

```blade
<img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
```

React can display the same image using:

```javascript
`${API_BASE}/storage/${event.image}`
```

This allows both the Laravel back-office and React frontend to use the same image path stored in the database.

---

# 🧠 Laravel Concepts Demonstrated

This project demonstrates several important Laravel concepts:

- MVC architecture
- Routes
- Controllers
- Models
- Blade templates
- Eloquent ORM
- Migrations
- Seeders
- Authentication
- Middleware
- Form validation
- CSRF protection
- REST APIs
- JSON responses
- Environment variables
- File storage
- Symbolic links
- Foreign keys
- Database constraints
- One-to-many relationships
- Many-to-many relationships
- Pivot tables

---

# ⚛️ React Concepts Demonstrated

The frontend demonstrates:

- Functional components
- JSX
- Props
- `useState`
- `useEffect`
- `useRef`
- React Router
- `useParams`
- API requests with `fetch`
- Conditional rendering
- Array `.map()`
- Array `.filter()`
- Event handlers
- Dynamic CSS classes
- Environment variables
- Internationalization
- Reusable components
- Loading states
- Error handling

---

# 🎨 User Interface

The application uses:

- Bootstrap
- Bootstrap Icons
- Custom CSS

The Laravel administration interface provides tables and forms for managing historical data.

The React frontend provides a more visual experience for exploring historical events.

Features include:

- Responsive event cards
- Event detail pages
- Historical person information
- Historical era filters
- Hero sections
- Parallax effects
- Responsive layouts
- Modals
- Images
- Multilingual navigation and content

---

# 🎯 Project Goals

The main goal of Historical Events is to demonstrate the development of a complete full-stack web application.

The project combines:

```text
Database
   ↓
Laravel Models
   ↓
Eloquent ORM
   ↓
Laravel Controllers
   ↓
REST API
   ↓
JSON
   ↓
React
   ↓
User Interface
```

At the same time, Laravel Blade provides an authenticated administration system for managing the database.

The project demonstrates the connection between frontend development, backend development and relational database design.

---

# 📚 What I Learned

During the development of Historical Events, I practiced and improved my knowledge of:

- Designing relational databases
- Creating Laravel migrations
- Creating and using seeders
- Working with foreign keys
- Creating one-to-many relationships
- Creating many-to-many relationships
- Working with pivot tables
- Preventing duplicate database relationships
- Using Eloquent ORM
- Building Laravel controllers
- Creating CRUD interfaces
- Building REST APIs
- Returning JSON data
- Connecting React to Laravel
- Using React Hooks
- Creating dynamic routes
- Fetching data from APIs
- Managing application state
- Creating reusable React components
- Handling images with Laravel Storage
- Using environment variables
- Implementing multilingual interfaces
- Managing authenticated users
- Using Git and GitHub for version control

---

# 🔮 Possible Future Improvements

Possible future developments include:

- Advanced event search
- Search by historical person
- Timeline visualization
- More languages
- User favorites
- Interactive maps
- Event categories
- Improved administration dashboard
- Pagination
- Advanced API filtering
- Improved accessibility
- Automated tests
- Deployment to a production environment

---

# 👨‍💻 Author

**Giusto Antona**

Full Stack Web Developer

GitHub username:

giustoantonadev

---

# 📄 License

This project was created for **educational and portfolio purposes**.