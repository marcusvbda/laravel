<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\{Sluggable,SluggableScopeHelpers};
use Cviebrock\EloquentSluggable\Services\SlugService;
use marcusvbda\commonModels\Models\{Category};
use marcusvbda\commonModels\Scopes\{OnlyChildrenScope};

class SubCategory extends Model
{
  use SoftDeletes,Sluggable,SluggableScopeHelpers;

  protected $table = 'categories';
  protected $fillable = [
    'name',
    'parent'
  ];

  protected static function boot(){
		parent::boot();
		static::addGlobalScope(new OnlyChildrenScope);
	}

  public function sluggable()
  {
    return
    [
      'slug' =>
      [
        'source' => 'name'
      ]
    ];
  }

  public function setNameAttribute($value){
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
  }

  public function categories()
  {
    return $this->belongsTo(Category::class,"parent");
  }

}
