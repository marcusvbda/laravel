<?php

namespace marcusvbda\commonModels\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait hasCode
{
    private function hasCode()
    {
        $this->append('code');
        // $class = explode('\\', get_class($this));
        // $class = end($class);
        // Hashids::connection($class);
    }

    public function getCodeAttribute()
    {
        return \Hashids::encode($this->id);
    }
}
