/** @type {import('tailwindcss').Config} */
export default {
    content: ['./resources/**/*.blade.php', './resources/**/*.js'],
    theme: {
        extend: {
            colors: {
                'broken': "rgb(200,200,20)"
            }

        },
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
