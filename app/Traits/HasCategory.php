<?php 
namespace App\Traits;

use App\Models\{ModelCategory};
trait HasCategory
{
	public function addCategory($category, $primary = false)
	{
        $model = $this->getMorphClass();
        return ModelCategory::create([
            'model_type'   => $model,
            'model_id'     => $this->id,
            'primary'      => $primary,
            'category_id'  => $category,
        ]);
    }

    public function removeAllCategories()
    {
        $model = $this->getMorphClass();
        return ModelCategory::where("model_type",$model)->where("model_id",$this->id)->delete();
    }

    public function getPrimaryCategory()
    {
        $model = $this->getMorphClass();
        $result = ModelCategory::where("model_type",$model)->where("model_id",$this->id)->where("primary",1);
        return  ( $result->count()>0 ? $result->first()->category_id : null );
    }
    
}