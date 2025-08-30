<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'image',
        'quantity',
        'description',
        'status',
        'featured',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
