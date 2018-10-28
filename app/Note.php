<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Note extends Model
{
use Sluggable;
/**
 * Return the sluggable configuration array for this model.
 *
 * @return array
 */
public function sluggable()
{
    return [
        'slug' => [
            'source' => 'title'
        ]
    ];
}
  protected $fillable = [
       'title', 'body','user_id','folder_id','category_id',
   ];
  public function user () {
    return $this->belongsTo('App\User');
  }
  public function folder () {
      return $this->belongsTo('App\Folder');
    }
  public function categories () {
      return $this->belongsToMany('App\Category');
    }
}
