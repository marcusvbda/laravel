<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\{Sluggable,SluggableScopeHelpers};
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Scopes\OnlyParentScope;
use App\Models\{SubCategory};

class Category extends Model
{
	use SoftDeletes,Sluggable,SluggableScopeHelpers;

	protected $table = 'categories';
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
