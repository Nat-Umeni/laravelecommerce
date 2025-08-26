<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\AttributeValue;

class Attribute extends Model
{
    protected $fillable = ['name','slug'];

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
