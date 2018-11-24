<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use marcusvbda\commonModels\Traits\HasMask;

class Pricing extends Model
{
    use HasMask;

    protected $table = 'pricing';
    protected $appends = ['fValue'];

    protected $fillable = [
        'id',
        'type',
        'description',
        'sku_id',
        'value',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
    ];

    public function sku()
    {
        return $this->belongsTo(Sku::class);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $this->removeMask($value);
        if (empty($this->description)) {
            if ($this->type == 'addition') {
                $this->attributes['description'] = 'Acréscimo';
            } elseif ($this->type == 'discount') {
                $this->attributes['description'] = 'Desconto';
            }
        }
    }

    public function getFValueAttribute()
    {
        return 'R$'.number_format($this->value, 2, ',', '.');
    }
}
