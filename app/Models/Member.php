<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'email'];
    // Atau, jika menggunakan Laravel versi sebelumnya
    // protected $guarded = [];

    // Contoh relasi dengan model lain
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}