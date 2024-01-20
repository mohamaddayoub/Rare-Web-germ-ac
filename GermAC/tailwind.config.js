/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "king": "#243253",
                "queen": "#eb5405",
                "dark": "#121c2d",
                "light": "#f6f6f6",
                "danger": "#d90429",
                "success": "#008000",
                "warning": "#f7b801",
                "info": "#2e3192",
            },
        },
    },
    plugins: [],
}
