<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Step extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['recipe_id', 'content', 'number', 'image_url'];

    protected $searchableFields = ['*'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
