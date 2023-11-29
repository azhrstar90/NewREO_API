<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Objects extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'objects';

    protected $primaryKey = 'ObjectID';

    // Other model properties and methods

    /**
     * Scope a query to filter products by type and price range.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['type'])) {
            $query->where('objectType', $filters['type']);
        }

        if (isset($filters['min_price'])) {
            $query->where('ObjectPrice', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price'])) {
            $query->where('ObjectPrice', '<=', $filters['max_price']);
        }

        return $query;
    }

    // DATABASE RELATIONSHIP BETWEEN oBECTS AND TRNASACTION
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'objects__transactions', 'ObjectTR_ID', 'TransOB_ID');
    }
}
