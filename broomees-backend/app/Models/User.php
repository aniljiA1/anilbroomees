<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'age'];

    public function relationships()
    {
        return $this->belongsToMany(
            User::class,
            'relationships',
            'user_id',
            'related_user_id'
        );
    }

    public function hobbies()
    {
        return $this->hasMany(\App\Models\Hobby::class);
    }
}
