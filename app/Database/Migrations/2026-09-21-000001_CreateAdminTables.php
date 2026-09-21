<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTables extends Migration
{
    public function up()
    {
        // 1. Users Table (Admin authentication)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'password_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'admin',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);

        // 2. Blogs Table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'unique'     => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default'    => 'IVF',
            ],
            'read_time' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => '5 min read',
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default'    => 'Dr. Meetu Bhushan',
            ],
            'img' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_featured' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'is_published' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('blogs', true);

        // 3. Inquiries Table (Consultations & Contact Queries)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'age' => [
                'type'       => 'INT',
                'constraint' => 3,
                'null'       => true,
            ],
            'appointment_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'consultation_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'New', // New, Contacted, Scheduled, Completed, Cancelled
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('inquiries', true);
    }

    public function down()
    {
        $this->forge->dropTable('inquiries', true);
        $this->forge->dropTable('blogs', true);
        $this->forge->dropTable('users', true);
    }
}
