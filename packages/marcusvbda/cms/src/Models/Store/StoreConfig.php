<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;

class StoreConfig extends Model
{
    protected $table = 'store_config';
    protected $fillable = [
        'id',
        'key',
        'value',
        'store_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function val($index)
    {
        $values = json_decode($this->value, true);

        return $values[$index];
    }
}
