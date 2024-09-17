/** @type {import('tailwindcss').Config} */

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                cus_gray: "#f5f5f5",
                yellow: "#ffe115",
                cus_blue: "#52594a",
                blue_old: "#2d3a4b",
                blue_soft: "#f1f4f9",
            },
            fontSize: {
                md: "24px",
            },
        },
    },

    plugins: [],
};
