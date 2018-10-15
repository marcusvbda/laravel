<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use marcusvbda\uploader\Traits\HasFiles;



class Teste extends Model
{
    use HasFiles;
    
    protected $table = 'teste';
	protected $fillable = [
		'name'
	];

}
