<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainc extends Model implements SluggableInterface
{
    
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    
    protected $fillable = [
        'title',
        'body',
        'summary'
    ];
}
