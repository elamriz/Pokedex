import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                fire: '#FF0000',   // red
                water: '#41c3e0',  // blue
                grass: '#00FF00',  // green
                red: {
                    600: '#e3342f',
                  },
                  green: {
                    600: '#38c172',
                  },
                  blue: {
                    600: '#3490dc',
                  },
                  yellow: {
                    600: '#ffed4a',
                  },
          
                // Ajoutez d'autres couleurs personnalisées ici si nécessaire
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
      require('daisyui'),
      forms
    ],
    safelist: [
        'text-fire',
        'text-water',
        'text-grass',
        // Ajoutez d'autres classes personnalisées ici si nécessaire
    ],
};
