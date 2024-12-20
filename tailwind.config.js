/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/**/*.html"
  ],
  theme: {
    extend: {
      fontFamily: {
        'primary': ['El Messiri', 'sans-serif'],
        'secondary' : ['Montserrat', 'sans-serif'],
      },
      margin: {
        '200px': '200px',
      },
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm: '2rem',
          lg: '4rem',
          xl: '5rem',
          '2xl': '6rem',
        },
      },
      colors:{
        'primary' : {
          1 : '#EBDDD1',
          3 : '#D9D9D9',
          4 : '#D3CBC5',
          5 : '#A52123',
        },
      }
    },
  },
  plugins: [],
}

