<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    public function children()
    {
        return $this->hasMany('App\Models\Frontend\Comment', 'level', 'id');
    }
}
