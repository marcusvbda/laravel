<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use marcusvbda\uploader\Traits\HasFiles;
use App\Models\Category;
use App\Models\Sku;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use marcusvbda\commonModels\Traits\HasCategory;
use marcusvbda\commonModels\Traits\HasMask;
use marcusvbda\commonModels\Traits\hasCode;
use Lecturize\Tags\Traits\HasTags;

class Product extends Model
{
    use SoftDeletes,HasFiles,HasCategory,Sluggable,SluggableScopeHelpers,HasTags,HasMask,hasCode;

    protected $table = 'products';
    protected $appends = ['code', 'meta', 'fPrice'];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'type',
        'status',
        'base_price',
        'variations',
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

    public function getFPriceAttribute()
    {
        return 'R$'.number_format($this->base_price, 2, ',', '.');
    }

    protected $casts = [
        'variations' => 'array',
        'created_at' => 'datetime:d/m/Y',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
    }

    public function categories()
    {
        $model = $this->getMorphClass();

        return $this->belongsToMany(Category::class, 'model_categories', 'model_id')->where('model_type', $model)->where('model_id', $this->id)->select('categories.*', 'model_categories.primary');
    }

    public function getMetaAttribute()
    {
        $string = preg_replace('/<[^>]*>/', ' ', $this->description);
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        $string = trim(preg_replace('/ {2,}/', ' ', $string));

        return $string;
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function getCodeAttribute()
    {
        return \Hashids::encode($this->id);
    }

    public function setBasePriceAttribute($value)
    {
        $this->attributes['base_price'] = $this->removeMask($value);
    }
}
