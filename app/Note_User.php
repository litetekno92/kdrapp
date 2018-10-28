<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note_User extends Model
{
  protected $fillable = [
      'user_id','note_id',
   ];
}
