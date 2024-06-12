<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }
}
