import flowbite from "flowbite/plugin";
import { addDynamicIconSelectors } from "@iconify/tailwind";

/** @type {import('tailwindcss').Config} */
export default {
  darkMode: "class",
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#173334",
        secondary: "#FFBE30",
        accent: "#11AF22",
        surface: "#ffffff",
        "surface-dark": "#D9D9D9",
      },
    },
  },
  plugins: [flowbite, addDynamicIconSelectors()],
};
