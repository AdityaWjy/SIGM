/** @type {import('tailwindcss').Config} */
module.exports = {
  // use this code, if you use php and tailwind
  content: ["./index.php", "./src/**/*.{html,js,ts,jsx,tsx,php}"],
  theme: {
    extend: {
      colors: {
        hightlight : "#ff8e3c",
        tertiary : "#d9376e",
        industry : "#20272C",
        brand   : "#55B9CC",
        lime : "#A3E635",
        primary : "#181D43",
        yellow : "#FACC15"


      }
    },
  },
  plugins: [],
}

