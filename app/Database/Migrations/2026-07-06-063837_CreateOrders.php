<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrders extends Migration
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
            'invoice'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>true
            ],
            'total'=>[
                'type'=>'DECIMAL',
                'constraint'=>'12,2',
                'default'=>0
            ],
            'status'=>[
                'type'=>'ENUM',
                'constraint'=>['Pending','Diproses','Selesai'],
                'default'=>'Pending'
            ],
            'created'=>[
                'type'=>'DATETIME',
                'null'=>true
            ]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}