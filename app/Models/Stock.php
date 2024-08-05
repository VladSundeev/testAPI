<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['good_id', 'count', 'address'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
