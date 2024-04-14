<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Stadium extends Model
{
    use HasFactory;
    protected $table = 'stadiums'; // Spécifiez le nom de votre table ici
    protected $fillable = ['name', 'capacity', 'address'];
}
