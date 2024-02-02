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
                    50: "#fefce8",
                    100: "#fffac2",
                    200: "#fff289",
                    300: "#ffe345",
                    400: "#fdd017",
                    500: "#edb505",
                    600: "#cd8c01",
                    700: "#a36305",
                    800: "#874e0c",
                    900: "#724011",
                    950: "#432005",
                },
            },
        },
    },
    plugins: [],
};
