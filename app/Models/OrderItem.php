<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'plant_id', 'quantity', 'price'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
