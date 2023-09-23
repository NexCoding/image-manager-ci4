<?php

namespace NexCoding\ImageManagerCi4\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMediaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'm_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'm_file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'm_file_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'm_file_size' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'm_file_ext' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'm_file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'm_orig_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'm_created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'm_updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addPrimaryKey('m_id');
        $this->forge->createTable('media');
    }

    public function down()
    {
        $this->forge->dropTable('media');
    }
}
