import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            background: {
                'flyff-example': 'url("/storage/images/flyff-example.jpeg")',
            },
            colors: {
                'cerise': '#dd4a6cff',
                'charcoal': '#1c4052ff',
                'robin-blue': '#4fc5d5ff',
                'coral': '#fe906bff',
                'acri-magenta': '#852a4bff',
                'old-rose': '#c67e70ff',
                'cordovan': '#9a4650ff',
                'oxford-blue': '#001b30ff',
                'mantis': '#50b95eff',
                'platinum': '#dbe1dfff',
            },
        },

    },

    plugins: [forms, typography],
};
