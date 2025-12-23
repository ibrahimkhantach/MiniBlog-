import defaultTheme from 'tailwindcss/defaultTheme';

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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Outfit', 'sans-serif'],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono], // For code blocks
            },
            colors: {
                // Custom Color Palette: "Modern Tech Blog"
                dark: {
                    bg: '#0f172a',      // Slate 900
                    card: '#1e293b',    // Slate 800
                    text: '#f1f5f9',    // Slate 100
                    muted: '#94a3b8',   // Slate 400
                },
                primary: {
                    DEFAULT: '#7c3aed', // Violet 600
                    hover: '#6d28d9',   // Violet 700
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};