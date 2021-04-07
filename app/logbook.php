<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logbook extends Model
{
  protected $table = 'logbooks';
   public $timestamps = false;

  protected $fillable = [
      'student_id', 'created_at','updated_at'
  ];
    //
        public function students()
    {
      return $this->belongsTo('App\students','student_id');
    }
}
