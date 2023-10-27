<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'suggestion',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upvotes()
    {
        return $this->belongsToMany(User::class, 'upvotes')->withTimestamps();
    }
}
