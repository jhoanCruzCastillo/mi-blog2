const BASE_URL = 'http://localhost:8080/api'

export const postService = {

    // trae todos los posts
    getAll() {
        return fetch(`${BASE_URL}/posts`)
            .then(res => res.json())
    },

    // trae un post por id
    getOne(id) {
        return fetch(`${BASE_URL}/posts/${id}`)
            .then(res => res.json())
    },

    // crea un post nuevo
    create(data) {
        return fetch(`${BASE_URL}/posts`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }).then(res => res.json())
    },

    // actualiza un post
    update(id, data) {
        return fetch(`${BASE_URL}/posts/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }).then(res => res.json())
    },

    // elimina un post
    delete(id) {
        return fetch(`${BASE_URL}/posts/${id}`, {
            method: 'DELETE'
        }).then(res => res.json())
    }
}