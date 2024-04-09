<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'active'];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_store', 'book_id', 'store_id');
    }
}
