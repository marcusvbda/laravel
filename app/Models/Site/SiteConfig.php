<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
	
    protected $table = 'site_config';
    protected $appends = ['edit_route'];
	protected $fillable = [
		'title',
		'menus'
	];

	public function getEditRouteAttribute()
	{
		return route('site.edit',['id'=>$this->id]);
	}

}
