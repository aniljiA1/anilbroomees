<?php

namespace App\Domain\Relationship\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['user_id', 'friend_id'];
    public $timestamps = true;
}
