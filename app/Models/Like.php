<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'recipe_id'];

    protected $searchableFields = ['*'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
