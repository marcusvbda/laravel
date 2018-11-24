<?php

namespace marcusvbda\commonModels\Traits;

use marcusvbda\commonModels\Models\{ModelCategory};

trait HasCategory
{
    public function addCategory($category, $primary = false)
    {
        $model = $this->getMorphClass();

        return ModelCategory::create([
            'model_type' => $model,
            'model_id' => $this->id,
            'primary' => $primary,
            'category_id' => $category,
        ]);
    }

    public function appEnds($category, $primary = false)
    {
        $model = $this->getMorphClass();

        return ModelCategory::create([
            'model_type' => $model,
            'model_id' => $this->id,
            'primary' => $primary,
            'category_id' => $category,
        ]);
    }
}
