
<script>
import { postService } from '../services/api.js'
import PostForm from './PostForm.vue'

export default {
  components: { PostForm },

  data() {
    return {
      posts: [],
      cargando: false,
      mostrarFormulario: false,
      postSeleccionado: null,
    }
  },

  mounted() {
    // mounted() se ejecuta cuando el componente aparece en pantalla
    this.cargarPosts()
  },

  methods: {
    abrirFormulario() {
    this.mostrarFormulario = true;
    console.log("El valor de mostrarFormulario esfff:", this.mostrarFormulario);
  },
    async cargarPosts() {
      this.cargando = true
      this.posts = await postService.getAll()
      this.cargando = false
    },

    editar(post) {
      this.postSeleccionado = post
      this.mostrarFormulario = true
    },

    async eliminar(id) {
      if (!confirm('¿Seguro que querés eliminar este post?')) return
      await postService.delete(id)
      await this.cargarPosts()
    },

    async onGuardado() {
      this.mostrarFormulario = false
      this.postSeleccionado = null
      await this.cargarPosts()
    },

    onCancelar() {
      this.mostrarFormulario = false
      this.postSeleccionado = null
    }
  }
}
</script>


<template>
  <div>
    <h1>Blog</h1>

    <button @click="abrirFormulario">Nuevo post</button>
    <PostForm
      v-if="mostrarFormulario"
      :post="postSeleccionado"
      @guardado="onGuardado"
      @cancelar="onCancelar"
    />

    <div v-if="cargando">Cargando posts...</div>

    <div v-for="post in posts" :key="post.id">
      <h2>{{ post.title }}</h2>
      <p>{{ post.content }}</p>
      <small>Por {{ post.author }}</small>
      <br />
      <button @click="editar(post)">Editar</button>
      <button @click="eliminar(post.id)">Eliminar</button>
    </div>
  </div>
</template>
