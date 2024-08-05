<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [ 'category_id', 'sku', 'name', 'price', 'description', 'is_published'];

    /**
     * @param $value
     * @return mixed
     */
    public function getPriceAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characteristics()
    {
        return $this->hasMany(Characteristic::class);
    }
}
