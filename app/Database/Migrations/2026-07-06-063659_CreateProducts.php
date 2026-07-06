<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'category_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'name'=>[
                'type'=>'VARCHAR',
                'constraint'=>150
            ],
            'description'=>[
                'type'=>'TEXT',
                'null'=>true
            ],
            'price'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'stock'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'image'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>true
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}