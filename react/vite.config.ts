import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  base: './', // Corrige caminhos relativos
  build: {
    outDir: '../public/frontend', // Define onde o build será salvo
    emptyOutDir: true,
    rollupOptions: {
      output: {
        entryFileNames: 'assets/index.js',  // Define o nome fixo do JS
        chunkFileNames: 'assets/chunk-[name].js', // Define nome fixo para chunks
        assetFileNames: 'assets/[name].[ext]' // Define nome fixo para assets (CSS, imagens, fontes)
      }
    }
  }
});
