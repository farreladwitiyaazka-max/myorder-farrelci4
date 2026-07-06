<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCart extends Migration
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
            'user_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'product_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'qty'=>[
                'type'=>'INT',
                'constraint'=>11,
                'default'=>1
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}