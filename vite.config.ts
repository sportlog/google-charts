import { resolve } from 'path';
import { defineConfig } from 'vite';

// https://vitejs.dev/config/
export default defineConfig({
    build: {
        lib: {
            // Could also be a dictionary or array of multiple entry points
            entry: resolve(__dirname, 'src/main.ts'),
            name: 'google-maps',
            // the proper extensions will be added
            fileName: 'google-maps',
        },
    },
});
