const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './public/vendor/**/*.vue',
        './public/vendor/**/*.blade.php',
        './public/vendor/**/*.php'
    ],

    theme: {
        extend: {
            colors: {
                zinc: {
                    850: '#222',
                },
                ukbb: {
                    400: '#47a3ff',
                    500: '#3399ff',
                    600: '#287acc',
                    700: '#236bb2'
                }
            },
            typography: {
                DEFAULT: {
                    css: {
                        color: colors.zinc["50"],
                        a: {
                            color: '#47a3ff',
                            '&:hover': {
                                color: '#3399ff'
                            }
                        },
                        strong: {
                            color: colors.pink['300']
                        }
                    },
                    prose: {
                    }

                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('@tailwindcss/line-clamp')],
};
