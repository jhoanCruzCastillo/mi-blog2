import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  server: {
    host: true,         // Permite conexiones externas (necesario para Docker)
    port: 5173,         // El puerto interno del contenedor
    strictPort: true,
    watch: {
      usePolling: true, // Revisa cambios por "petición" (esencial en Windows/Docker)
      interval: 100,    // Revisa cada 100ms (puedes ajustarlo si consume mucha CPU)
    },
    hmr: {
      // ESTA ES LA CLAVE:
      // Si en tu .env VUE_PORT es distinto a 5173, pon ese número aquí.
      // Esto le dice al navegador a qué puerto externo conectarse para el "re-load".
      clientPort: 5173, 
    },
  },
  plugins: [
    vue(),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
})