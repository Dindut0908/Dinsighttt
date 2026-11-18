import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import fs from 'node:fs';
import path from 'node:path';

export default defineConfig({
  plugins: [
    react(),
    {
      name: 'cleanup-build-php',
      closeBundle() {
        const phpPath = path.resolve('build', 'index.php');
        if (fs.existsSync(phpPath)) {
          fs.unlinkSync(phpPath);
        }
      },
    },
  ],
  build: {
    outDir: 'build',
    sourcemap: false,
  },
  server: {
    host: '0.0.0.0',
    port: 5173,
    proxy: {
      '/api': 'http://localhost:8080',
      '/uploads': 'http://localhost:8080',
    },
  },
});

