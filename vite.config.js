import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import 'dotenv/config';

export default defineConfig({
    build: {
        minify: process.env.APP_ENV === 'production' ? 'esbuild' : false,
        cssMinify: process.env.APP_ENV === 'production',
    }, plugins: [laravel({
        input: ['resources/js/central/dashboard.js', 'resources/js/tenant/dashboard.js'], refresh: true,
    }),],
});
