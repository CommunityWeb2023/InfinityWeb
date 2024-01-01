import './bootstrap';
import '../css/app.css';
import 'animate.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import LaravelPermissionToVuejs from "laravel-permission-to-vuejs";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Themes/${name}.vue`, import.meta.glob('./Themes/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props), mounted() {
                delete el.dataset.page;
            }
        });

        // Dynamischer Import von CookieConsent
        import("@/CookieConsent.js")
            .then((CookieConsent) => {
                app.use(CookieConsent.default);
            })
            .catch((error) => {
                console.error(error);
            });

        app.use(LaravelPermissionToVuejs)
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
