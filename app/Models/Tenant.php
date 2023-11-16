<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    public function apartment(): BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    public function rentReceipts(): HasMany
    {
        return $this->hasMany(RentReceipt::class);
    }
    
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
