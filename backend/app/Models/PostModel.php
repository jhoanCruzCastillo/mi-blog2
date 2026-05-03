<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    // tabla con la que trabaja este modelo
    protected $table      = 'posts';
    
    // campo primary key
    protected $primaryKey = 'id';

    // campos que se pueden llenar masivamente (seguridad)
    protected $allowedFields = ['title', 'content', 'author'];

    // CI4 maneja created_at y updated_at automáticamente
    protected $useTimestamps = true;
}