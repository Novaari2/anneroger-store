<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasStocks;

class Variation extends Model
{
    use HasFactory, HasStocks;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
