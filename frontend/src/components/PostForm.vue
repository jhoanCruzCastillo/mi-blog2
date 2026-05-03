<template>
  <div>
    <h2>{{ post ? 'Editar post' : 'Nuevo post' }}</h2>

    <form @submit.prevent="guardar">
      <div>
        <label>Título</label>
        <input v-model="form.title" type="text" required />
      </div>
      <div>
        <label>Contenido</label>
        <textarea v-model="form.content" required></textarea>
      </div>
      <div>
        <label>Autor</label>
        <input v-model="form.author" type="text" />
      </div>
      <button type="submit">Guardar</button>
      <button type="button" @click="$emit('cancelar')">Cancelar</button>
    </form>
  </div>
</template>

<script>
import { postService } from '../services/api.js'

export default {
  // props son datos que el componente padre le pasa a este
  props: {
    post: {
      type: Object,
      default: null
    }
  },

  // emit declara los eventos que este componente puede lanzar al padre
  emits: ['guardado', 'cancelar'],

  data() {
    return {
      form: {
        title:   '',
        content: '',
        author:  '',
      }
    }
  },

  mounted() {
    // si recibimos un post por props, llenamos el formulario con sus datos
    if (this.post) {
      this.form = { ...this.post }
    }
  },

  methods: {
    async guardar() {
      if (this.post) {
        await postService.update(this.post.id, this.form)
      } else {
        await postService.create(this.form)
      }
      this.$emit('guardado')
    }
  }
}
</script>