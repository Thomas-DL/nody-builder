<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stripe_id',
        'name',
        'description',
        'type',
        'price',
    ];

    public static function getTypeByStripeId($stripe_id): string
    {
        return self::where('stripe_id', $stripe_id)->firstOrFail()->type;
    }
}
