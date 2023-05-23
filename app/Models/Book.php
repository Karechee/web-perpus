<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'description'];
    // Atau, jika menggunakan Laravel versi sebelumnya
    // protected $guarded = [];

    // Contoh relasi dengan model lain
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
