<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VinylModel extends Model
{
    protected $table = 'vinyls';
    
    protected $fillable = [
      'bandName',
      'label',
      'musicGenre',
      'musicGenrePrimary',
      'vinylCover',
    ];
	
}
