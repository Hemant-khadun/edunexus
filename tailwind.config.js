import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '0' : 0,
                '9': '2.25rem', 
                '10': '2.5rem',
            },
            width: {
            '5/6': '83.333333%',
            },
            inset: {
                '1/3': '33.333333%',
            },
        },
    },

    plugins: [forms, typography, require('flowbite/plugin')],
};
