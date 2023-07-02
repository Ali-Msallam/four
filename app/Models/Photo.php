<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['advertisement_id', 'photo'];

    protected $searchableFields = ['*'];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
