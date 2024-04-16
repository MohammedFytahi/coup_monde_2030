<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'user_id',
        'date_reserved',
        'quantity',
    ];

    public function match()
    {
        return $this->belongsTo(Matche::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
