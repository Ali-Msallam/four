<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'recipe_id', 'number'];

    protected $searchableFields = ['*'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
