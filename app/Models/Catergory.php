<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catergory extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return
        [
            'slug' => [

                'source' => 'catergory_title'

            ]
        ];
    }
}
