<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{



    // protected $fillable = [
    //     'content',
    //     'likes',

    // ];


    //OR
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'

    ];

    public function comments(){
        return  $this->hasMany(Comment::class);
    }

    use HasFactory;
}
