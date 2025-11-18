<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['item_name', 'price', 'quantity', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
