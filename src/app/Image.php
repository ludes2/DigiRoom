<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title',
        'src',
        'mime_type',
        'description',
        'alt',
      ];
}
