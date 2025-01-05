import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#3490dc', // Blue
                secondary: '#ffed4a', // Yellow
                accent: '#e3342f', // Red
                background: '#f8fafc', // Light background
                darkbackground: '#1a202c', // Dark background
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    darkMode: 'class', // Enable dark mode with a class
    plugins: [],
};
