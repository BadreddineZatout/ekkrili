/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                gold: {
                    50: "#fdfbed",
                    100: "#f7f1ce",
                    200: "#efe198",
                    300: "#ead375",
                    400: "#e1ba3e",
                    500: "#d99e27",
                    600: "#c07b1f",
                    700: "#a05b1d",
                    800: "#82481e",
                    900: "#6b3b1c",
                    950: "#3d1e0b",
                },
            },
        },
    },
    plugins: [],
};
