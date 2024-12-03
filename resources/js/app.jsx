import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot, hydrateRoot } from 'react-dom/client';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`, // Sets the page title dynamically
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`, // Resolves components dynamically
            import.meta.glob('./Pages/**/*.jsx'),
        ),
    setup({ el, App, props }) {
        if (import.meta.env.SSR) { // Check if server-side rendering (SSR) is enabled
            hydrateRoot(el, <App {...props} />); // Hydrate the app for SSR
            return;
        }

        createRoot(el).render(<App {...props} />); // Render app on client-side
    },
    progress: {
        color: '#4B5563', // Sets progress bar color
    },
});
