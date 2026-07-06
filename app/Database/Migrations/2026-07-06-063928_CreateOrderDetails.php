<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderDetails extends Migration
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
            'order_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'product_id'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'qty'=>[
                'type'=>'INT',
                'constraint'=>11
            ],
            'price'=>[
                'type'=>'INT',
                'constraint'=>11
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('order_details');
    }

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}