<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
	use SoftDeletes,Sluggable,SluggableScopeHelpers;
	
    protected $table = 'pages';
	protected $fillable = [
		'name',
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
	
}
