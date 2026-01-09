<?php

namespace App\Domain\Hobby\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hobby extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'name'];

    protected static function booted()
    {
        static::creating(fn ($hobby) => $hobby->id = (string) Str::uuid());
    }
}
