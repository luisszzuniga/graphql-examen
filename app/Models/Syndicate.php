<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syndicate extends Model
{
    use HasFactory;

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
