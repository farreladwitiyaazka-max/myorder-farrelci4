<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('products')->insertBatch([

            [
                'category_id'=>1,
                'name'=>'Kursi Kayu Minimalis',
                'description'=>'Kursi kayu premium.',
                'price'=>450000,
                'stock'=>15,
                'image'=>'default.jpg'
            ],

            [
                'category_id'=>2,
                'name'=>'Meja Belajar',
                'description'=>'Meja belajar modern.',
                'price'=>850000,
                'stock'=>8,
                'image'=>'default.jpg'
            ],

            [
                'category_id'=>3,
                'name'=>'Lemari Pakaian',
                'description'=>'Lemari 2 pintu.',
                'price'=>1800000,
                'stock'=>5,
                'image'=>'default.jpg'
            ],

            [
                'category_id'=>4,
                'name'=>'Sofa Minimalis',
                'description'=>'Sofa ruang tamu.',
                'price'=>2500000,
                'stock'=>4,
                'image'=>'default.jpg'
            ]

        ]);
    }
}