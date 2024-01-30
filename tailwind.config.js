import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors.js';

/** @type {import('tailwindcss').Config} */
export default {
    mode: 'jit',
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/**/*.blade.php',
         
         "./vendor/wireui/wireui/src/*.php",
         "./vendor/wireui/wireui/ts/**/*.ts",
         "./vendor/wireui/wireui/src/View/**/*.php",
         "./vendor/wireui/wireui/src/WireUi/**/*.php",
         "./vendor/wireui/wireui/src/resources/**/*.blade.php", 
    ],
    theme: {
        extend: {
            colors:{
                primary: colors.indigo,
                secondary: colors.gray,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue
            },
            fontFamily: {
                sans: [...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
		forms
	],
};
