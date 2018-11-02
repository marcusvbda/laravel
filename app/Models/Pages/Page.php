<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Cviebrock\EloquentSluggable\{Sluggable,SluggableScopeHelpers};
use Cviebrock\EloquentSluggable\Services\SlugService;


class Page extends Model
{
	use SoftDeletes,Sluggable,SluggableScopeHelpers;
	

    protected $table = 'pages';
	protected $appends = ['url','destroy_route'];

	protected $fillable = [
		'name',
		'title',
		'content',
		'status'
	];

	public function setNameAttribute($value)
    {
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = SlugService::createSlug($this, 'slug', $value);
	}

	public function getUrlAttribute()
	{
		return 	asset($this->slug);
	}

	public function getDestroyRouteAttribute()
	{
		return 	route('paginas.deactivate', ['slug' => $this->slug]);
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
	
}
