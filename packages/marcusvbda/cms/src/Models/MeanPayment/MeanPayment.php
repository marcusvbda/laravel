<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeanPayment extends Model
{
    use SoftDeletes;

    protected $table = 'means_payment';
    protected $fillable = [
        'name',
    ];
}
