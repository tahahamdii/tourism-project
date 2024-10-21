<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'name', // Role name (e.g., 'admin', 'user')
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
