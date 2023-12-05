import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/pages/frontend/app.js',
                'resources/sass/app.scss',
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/dist/css/_app.css'],
            refresh: true,
        }),
    ],
});
