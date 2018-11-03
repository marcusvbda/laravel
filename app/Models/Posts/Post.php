<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\{Category};
use Cviebrock\EloquentSluggable\{Sluggable,SluggableScopeHelpers};
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Traits\HasCategory;

class Post extends Model
{
	use SoftDeletes,HasCategory,Sluggable,SluggableScopeHelpers;

	protected $table = 'Posts';
	protected $appends = ['meta','formated_created_at','categories_id','primary_category'];

	protected $fillable = [
		'name',
		'title',
		'description',
		'slug',
		'status'
	];

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

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
	}

	public function categories()
	{
		$model = $this->getMorphClass();
		return $this->belongsToMany(Category::class,"model_categories","model_id")->where("model_type",$model)->where("model_id",$this->id)->select("categories.*","model_categories.primary");
	}

	public function getFormatedCreatedAtAttribute()
	{
		return date("d/m/Y  -  H:i:s", strtotime($this->created_at));
	}

	public function getMetaAttribute()
	{
		$string = preg_replace ('/<[^>]*>/', ' ', $this->description);
		$string = str_replace("\r", '', $string);
		$string = str_replace("\n", ' ', $string);
		$string = str_replace("\t", ' ', $string);
		$string = trim(preg_replace('/ {2,}/', ' ', $string));
		return $string;
	}

	public function getCategoriesIdAttribute()
	{
		$ids = $this->categories->pluck("id")->toArray();
		return $ids;
	}

	public function getPrimaryCategoryAttribute()
	{
		return $this->getPrimaryCategory(); 
	}


}
