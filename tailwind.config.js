import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],
    theme: {
        extend: {
          fontFamily: {
          'roboto-slab': ['"Roboto Slab"', 'serif'],
          'roboto': ['"Roboto"', 'sans-serif'],
          },
          colors:{
          'navcolor':'#161925',
          'lb':'#235789',
          'db':'#161925',
          'cb':'#CBCBCB',
          },
          backgroundImage: {
              'custom-gradient': 'linear-gradient(to right, #FF6B6D, #FF9A6B, #FFFA5F, #74FF5C)',
          },
      },
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1680px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
    },
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    plugins: [],
};
