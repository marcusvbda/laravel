<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use marcusvbda\commonModels\scope\OnlyParentScope;
use marcusvbda\commonModels\Models\{Category};

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
