<?php

namespace marcusvbda\commonModels\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OnlyChildrenScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('parent',"!=", null);
    }
}
