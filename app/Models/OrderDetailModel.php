<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table="order_detail";

    protected $allowedFields=[

        'order_id',

        'product_id',

        'qty',

        'price'

    ];
}