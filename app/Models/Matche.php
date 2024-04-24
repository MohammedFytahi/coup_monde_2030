<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Matche extends Model
{
     use HasFactory;
     use SoftDeletes;

    protected $fillable = ['date', 'team1_id', 'team2_id', 'stadium_id', 'price', 'available_seats '];

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
    public function matchResults()
    {
        return $this->hasOne(Match_results::class, 'match_id');
    }
}
