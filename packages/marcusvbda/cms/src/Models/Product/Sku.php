<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use marcusvbda\uploader\Traits\HasFiles;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use marcusvbda\commonModels\Traits\HasMask;
use marcusvbda\commonModels\Traits\hasCode;
use App\Models\Pricing;

class Sku extends Model
{
    use SoftDeletes,HasFiles,Sluggable,SluggableScopeHelpers,HasMask,hasCode;

    protected $table = 'skus';
    protected $appends = ['code', 'fPrice', 'fCost', 'fCompare_at'];
    protected $fillable = [
        'name',
        'slug',
        'price',
        'weight',
        'inventory',
        'product_id',
        'sku_code',
        'attributes',
        'cost',
        'compare_at',
    ];
    protected $casts = [
        'attributes' => 'array',
    ];

    public function sluggable()
    {
        return
        [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function calcPrice()
    {
        $price = $this->product->base_price;
        $elements = Pricing::where('sku_id', $this->id)->get();
        foreach ($elements as $element) {
            if ($element->type == 'addition') {
                $price += $element->value;
            } else {
                $price -= $element->value;
            }
        }
        $this->price = $price;
        $this->save();

        return $this;
    }

    public function getFPriceAttribute()
    {
        return 'R$'.number_format($this->price, 2, ',', '.');
    }

    public function getFCostAttribute()
    {
        return 'R$'.number_format($this->cost, 2, ',', '.');
    }

    public function getFCompareAtAttribute()
    {
        return 'R$'.number_format($this->compare_at, 2, ',', '.');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
    }

    public function setSkuCodeAttribute($value)
    {
        $this->attributes['sku_code'] = $value;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pricing()
    {
        return $this->hasMany(Pricing::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $this->removeMask($value);
    }

    public function setCostAttribute($value)
    {
        $this->attributes['cost'] = $this->removeMask($value);
    }

    public function setCompareAtAttribute($value)
    {
        $this->attributes['compare_at'] = $this->removeMask($value);
    }

    public function setWeightAttribute($value)
    {
        $this->attributes['weight'] = $this->removeMask($value);
    }

    public function generateSku()
    {
        return \Hashids::connection('sku')->encode($this->product_id.$this->id);
    }

    public function getCodeAttribute()
    {
        return \Hashids::encode($this->id);
    }
}
