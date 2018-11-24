<?php

namespace marcusvbda\commonModels\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\{Sluggable,SluggableScopeHelpers};
use Cviebrock\EloquentSluggable\Services\SlugService;
use marcusvbda\commonModels\Models\{SubCategory};
use marcusvbda\commonModels\Scopes\OnlyParentScope;

class Category extends Model
{
	use SoftDeletes,Sluggable,SluggableScopeHelpers;

	protected $table = 'categories';
	protected $appends = ['padId'];
	protected $fillable = [
		'name',
		'slug',
		'parent'
	];

	protected static function boot(){
		parent::boot();
		static::addGlobalScope(new OnlyParentScope);
	}

	public function sluggable(){
		return
		[
			'slug' =>
			[
				'source' => 'name'
			]
		];
	}

	public function getPadIdAttribute()
	{
		return str_pad($this->id,6,"0",STR_PAD_LEFT);
	}

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
	}


	public function subCategories()
	{
		return $this->hasMany(SubCategory::class,"parent");
	}

}
