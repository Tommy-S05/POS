import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/pdf.css',
                'resources/js/app.js',
                'resources/sass/fonts.scss',

                //JS Admin
                // 'resources/Melody/vendors/js/vendor.bundle.base.js',
                // 'resources/Melody/vendors/js/vendor.bundle.addons.js',
                // 'resources/Melody/js/off-canvas.js',
                // 'resources/Melody/js/hoverable-collapse.js',
                // 'resources/Melody/js/misc.js',
                // 'resources/Melody/js/settings.js',
                // 'resources/Melody/js/todolist.js',
                // 'resources/Melody/js/dashboard.js',
                //JS
                'resources/Melody/js/data-table.js',
                'resources/Melody/js/alerts.js',
                'resources/Melody/js/avgrund.js',
            ],
            refresh: true,
        }),
    ],
});
