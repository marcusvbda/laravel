<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OnlyParentScope;
use App\Models\{Category};

class ModelCategory extends Model
{
	protected $table = 'model_categories';
	protected $fillable = [
		'model_type',
		'model_id',
		'category_id',
		'primary'
	];

	public function Category()
	{
		return $this->hasMany(Category::class);
	}

}
