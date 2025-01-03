import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: [
            {
                // this is required for the SCSS modules
                find: /^~(.*)$/,
                replacement: '$1',
                '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
                '$': 'jQuery'
            },
        ],
    },
});
