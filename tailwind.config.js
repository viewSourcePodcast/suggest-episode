import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            gray: colors.slate,
            red: colors.red,
            green: {
                50: "#f1f8f7",
                100: "#e3f1ef",
                200: "#c7e4de",
                300: "#aad6ce",
                400: "#8ec9bd",
                500: "#72bbad",
                600: "#5b968a",
                700: "#447068",
                800: "#2e4b45",
                900: "#172523",
            },
            blue: {
                50: "#eaf1f2",
                100: "#d6e3e5",
                200: "#acc7cb",
                300: "#83acb2",
                400: "#599098",
                500: "#30747e",
                600: "#265d65",
                700: "#1d464c",
                800: "#132e32",
                900: "#0a1719",
            },
        },
    },

    plugins: [forms],
};
