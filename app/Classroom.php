<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $fillable = [
        'tables', 'components', 'title',
    ];
    public function students()
{
      return $this->hasMany('App\Students','classroom_id','id');
}

}
