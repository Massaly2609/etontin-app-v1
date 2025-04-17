import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class', // Ajout du mode sombre

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans], // Remplacement de Figtree par Poppins
            },
            colors: {
                primary: {
                    500: '#2563eb',
                    600: '#1d4ed8',
                },
                dark: {
                    900: '#0f172a',
                    800: '#1e293b',
                },
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
            boxShadow: {
                'xl': '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
                '2xl': '0 25px 50px -12px rgb(0 0 0 / 0.25)',
            },
            keyframes: {
                fadeIn: {
                    from: { opacity: 0, transform: 'translateY(20px)' },
                    to: { opacity: 1, transform: 'translateY(0)' },
                },
            },
            animation: {
                'fade-in': 'fadeIn 0.8s ease-out',
            },
            container: {
                center: true,
                padding: '1.5rem',
            },
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'), // Ajout du plugin typographie
    ],
};
