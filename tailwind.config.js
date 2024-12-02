import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

module.exports = {
    content: [
      './resources/**/*.{js,jsx,ts,tsx}',
      './node_modules/@tremor/**/*.{js,ts,jsx,tsx}',
    ],
    theme: {
      extend: {
        colors: {
          tremor: {
            brand: {
              faint: '#eff6ff',
              muted: '#bfdbfe',
              subtle: '#60a5fa',
              DEFAULT: '#3b82f6',
              emphasis: '#1d4ed8',
            },
          },
        },
      },
    },
    plugins: [],
  }
