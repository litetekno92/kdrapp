<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
  use Sluggable;

  protected $fillable = [
     'name', 'slug',
 ];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

/**
 * [notes description]
 * @return [type] [description]
 */
 public function notes() {
      return $this->belongsToMany ('App\Note');
    //  return $this->belongsToMany(Note::class,'category_note','note_id','category_id');
    }
}
