import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            publicDirectory: "public",
        }),
    ],

    // // maybe not needed, cpanel fix
    // build: {
    //     outDir: 'public/build',
    //     manifest: true,
    //     rollupOptions: {
    //         output: {
    //             manualChunks: {}
    //         }
    //     }
    // },
    // // maybe not needed, cpanel fix
    // server: {
    //     https: false,
    //     host: true,
    //     strictPort: true,
    //     port: 5173,
    // }
});
