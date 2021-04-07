<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    //
    protected $table = 'students';

    protected $fillable = [
        'name', 'reg_no', 'avatar',
    ];

        public function logbook()
    {
      return $this->hasMany('App\logbook','student_id');
    }
}
