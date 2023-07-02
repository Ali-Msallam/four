<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavRecipe extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'recipe_id'];

    protected $searchableFields = ['*'];

    protected $table = 'fav_recipes';

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
