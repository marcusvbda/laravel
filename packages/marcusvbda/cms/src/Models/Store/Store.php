<?php

namespace marcusvbda\commonModels\Models;

use Illuminate\Database\Eloquent\Model;
use marcusvbda\commonModels\Models\{Product};


class Store extends Model
{
  public $appends = ['db_name'];
  public $guarded = ['id'];

  public function setDomainAttribute($value){
    $val =  preg_replace("/(^https?:?(\/{0,2})?(www\.)?|[^A-Za-z0-9\.])/i","",strtolower($value));
    $this->attributes['domain'] = $val;
  }

  public function getDbNameAttribute(){
    return preg_replace("/(^https?:?(\/{0,2})?(www\.)?|[^A-Za-z0-9\.])/i","",strtolower($this->domain));
  }


  public function products()
  {
	  return $this->belongsTo(Product::class,"products_stores");
  }
}
