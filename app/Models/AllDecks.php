<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllDecks extends Model
{
    use HasFactory;

    protected $table = 'all_decks';

    protected $fillable = [
        'name',
        'user_id',
        'author',
        'public',
        'comments',
        'rate'
    ];
}
