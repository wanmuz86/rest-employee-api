<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'place',
        'completed',
        'user_id',
        'date'
    ];
    function user(){
        return $this->belongsTo(User::class);
    }

    function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
