# Frontend

React + Vite frontend for the Historical Events application.

## Quick start

- Install dependencies:

```
cd frontend
npm install
```

- Run the development server:

```
npm run dev
```

The Vite dev server runs at `http://localhost:5173` by default.

- Build for production:

```
npm run build
```

- Preview a production build locally:

```
npm run preview
```

- Lint the project:

```
npm run lint
```

## Environment

This project uses Vite environment variables. Create a file named `.env` or `.env.local` in the `frontend` folder to configure runtime values. Example:

```
VITE_API_URL=http://localhost:8000
```

Access the variable in code via `import.meta.env.VITE_API_URL`.

## Connecting with the backend

- Start the Laravel backend (example):

```
cd backend
php artisan serve
```

- Ensure `VITE_API_URL` points to the backend address (for example `http://localhost:8000`).

## Available scripts

- `dev` — starts the Vite development server (`vite`).
- `build` — creates an optimized production build (`vite build`).
- `preview` — locally serves the production build (`vite preview`).
- `lint` — runs `oxlint`.

These are defined in `package.json`.

## Project structure (important files)

- `index.html` — Vite HTML entry
- `src/main.jsx` — application entry
- `src/App.jsx` — app root component
- `src/i18n.js` — i18n initialization
- `public/` — static assets

## Deployment

- Build with `npm run build` and deploy the `dist/` folder to any static host (Netlify, Vercel, S3, etc.).
- To have Laravel serve the built assets, copy or move the `dist/` contents into the backend `public` directory (or configure your backend to serve the `dist` folder).

## Troubleshooting

- If the frontend cannot reach the API, verify `VITE_API_URL` and that the backend is running and accessible.
- If ports conflict, change the dev server or backend port.

## Notes

This frontend uses React, React Router, `i18next`, Bootstrap and Vite. See `package.json` for the exact dependencies and dev-dependencies.

