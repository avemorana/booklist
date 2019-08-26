<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
