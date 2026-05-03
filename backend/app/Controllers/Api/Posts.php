<?php

namespace App\Controllers\Api;

use App\Models\PostModel;
use CodeIgniter\RESTful\ResourceController;

class Posts extends ResourceController
{
    protected $modelName = 'App\Models\PostModel';
    protected $format    = 'json';

    // GET /api/posts — lista todos los posts
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/posts/1 — trae un post por id
    public function show($id = null)
    {
        $post = $this->model->find($id);
        if (!$post) {
            return $this->failNotFound('Post no encontrado');
        }
        return $this->respond($post);
    }

    // POST /api/posts — crea un post nuevo
    public function create()
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated(['message' => 'Post creado exitosamente']);
    }

    // PUT /api/posts/1 — actualiza un post
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['message' => 'Post actualizado exitosamente']);
    }

    // DELETE /api/posts/1 — elimina un post
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Post no encontrado');
        }
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Post eliminado exitosamente']);
    }
}