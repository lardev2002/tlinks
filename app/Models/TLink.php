<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLink extends Model
{
    use HasFactory;

    const LINK_NOT_ACTIVE_STATE = 0;
    const LINK_ACTIVE_STATE = 1;

    protected $fillable = [
        'link',
        'transition_limit',
        'token',
        'lifetime',
        'transitions',
        'is_active'
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active',  self::LINK_ACTIVE_STATE);
    }

}
