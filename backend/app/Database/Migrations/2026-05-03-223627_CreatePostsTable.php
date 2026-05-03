<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
                'default'    => 'Anónimo',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        // down() se ejecuta cuando hacés rollback — deshace el up()
        $this->forge->dropTable('posts');
    }
}