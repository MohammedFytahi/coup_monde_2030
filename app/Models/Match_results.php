<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match_results extends Model
{
    use HasFactory;
    protected $fillable = [
        'match_id',
        'team1_score',
        'team2_score',
        'result'
    ];

    public function match()
    {
        return $this->belongsTo(Matche::class, 'match_id');
    }
}
