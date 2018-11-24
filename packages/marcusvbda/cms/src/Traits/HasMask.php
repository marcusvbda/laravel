<?php

namespace marcusvbda\commonModels\Traits;

trait HasMask
{
    public function removeMask($value)
    {
        if (strrpos($value, '$')) {
            return preg_replace('/\,/', '.', preg_replace('/[^\d\,]/', '', $value));
        } else {
            return $value;
        }
    }
}
