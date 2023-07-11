<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['title'];

    public function product()
    {
        return $this->belongsTo('upload\Product');
    }
}
