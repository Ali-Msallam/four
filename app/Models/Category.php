<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'image'];

    protected $searchableFields = ['*'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
