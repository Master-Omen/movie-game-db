<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Content extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'NULL' => true
            ],
            'favorite' => [
                'type' => 'BOOLEAN',
            ],
            'watchlist' => [
                'type' => 'BOOLEAN',
            ],
            'imdbId' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'ori_title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'releaseDate' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'runtime' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'ratingsSummary' => [
                'type' => 'DOUBLE'
            ],
            'genres' => [
                'type' => 'JSON'
            ],
            'plot' => [
                'type' => 'TEXT'

            ],
            'primaryImage' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'images' => [
                'type' => 'JSON',
            ],
            'thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true); // set primary key;
        $this->forge->createTable('contents'); // set table
    }

    public function down()
    {
        $this->forge->dropTable('contents'); // drop table migrate:rollback
    }
}
