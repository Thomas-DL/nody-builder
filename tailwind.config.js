/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    './vendor/filament/**/*.blade.php',
    './node_modules/preline/dist/*.js',
  ],
  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
}

