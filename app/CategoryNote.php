<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryNote extends Pivot
{
  protected $fillable = [
     'note_id', 'category_id'
 ];
}
