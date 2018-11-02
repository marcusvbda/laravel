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
	protected $appends = ['meta','formated_created_at'];

	protected $fillable = [
		'name',
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
		return $this->belongsToMany(Category::class,"model_categories","model_id")->where("model_id",$model)->select("categories.*","model_categories.primary");
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



}
