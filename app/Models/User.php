<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use Searchable;

    protected $fillable = ['f_name', 'l_name', 'email', 'password', 'image'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
