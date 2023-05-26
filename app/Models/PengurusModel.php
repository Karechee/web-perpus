<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusModel extends Model
{
    use HasFactory;
    protected $table        = "pengurus";
    protected $primaryKey   = "id_pengurus";
    protected $fillable     = ['id_pengurus','nama_pengurus','email'];
}