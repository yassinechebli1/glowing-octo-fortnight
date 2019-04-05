<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Students extends Model
{
    protected $fillable = [
       'name', 'email', 'password',
   ];
   use SoftDeletes;

   public function classroom()
    {
      return $this->hasOne('App\Classroom','id','classroom_id');
     }
}
