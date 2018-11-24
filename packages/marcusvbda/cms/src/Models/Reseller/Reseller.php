<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use marcusvbda\commonModels\Traits\hasCode;

class Reseller extends Model
{
    use SoftDeletes,hasCode;

    protected $table = 'resellers';

    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['code', 'padId'];

    public function getCodeAttribute()
    {
        return \Hashids::encode($this->id);
    }

    public function getPadIdAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function setDocAttribute($value)
    {
        $this->attributes['doc'] = preg_replace('/[^A-Za-z0-9]/', '', $value);
    }

    public function getDocAttribute($value)
    {
        switch ($this->type) {
            case 0:
            return substr($value, 0, 3).'.'.substr($value, 3, 3).
            '.'.substr($value, 6, 3).'-'.substr($value, 9, 2);
            break;
            case 1:
            return substr($value, 0, 2).'.'.substr($value, 2, 3).
            '.'.substr($value, 5, 3).'/'.
            substr($value, 8, 4).'-'.substr($value, 12, 2);
            break;
            default:
            return $value;
            break;
        }
    }
}
