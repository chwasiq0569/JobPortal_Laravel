<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class details extends Model
{
    use Searchable, HasFactory;
    public $guarded = [];

    public function toSearchableArray(): array
    {
        return [
            'skills' => $this->skills,
            'location' => $this->location,
        ];
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
