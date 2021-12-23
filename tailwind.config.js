const defaultTheme = require('tailwindcss/defaultTheme')
// import tailwindTypography from '@tailwindcss/typography'

module.exports = {
  mode: 'jit',
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
 
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: defaultTheme.colors.green
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
