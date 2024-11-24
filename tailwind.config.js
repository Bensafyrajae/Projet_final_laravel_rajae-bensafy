import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gold: "#FFD700",
                softBlue: 'rgba(55, 136, 216, 0.15)',
                lightGray: '#f3f4f6',
                mediumGray: '#e5e7eb',
                
            }
        },
    },

    plugins: [forms],
};
