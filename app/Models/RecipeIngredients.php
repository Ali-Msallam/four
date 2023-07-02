<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeIngredients extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'recipe_id',
        'ingredients_id',
        'quanttity',
        'reduserCompany',
        'is_main_ingredient',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'recipe_ingredients';

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredients::class);
    }
}
