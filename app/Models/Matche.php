<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
     use HasFactory;

    protected $fillable = ['date', 'team1_id', 'team2_id', 'stadium_id', 'price'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function stadium()
    {
        return $this->belongsTo(Stadium::class, 'stadium_id');
    }
}
