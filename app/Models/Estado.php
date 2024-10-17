<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estado';
    protected $table = 'estados';

    protected $fillable = [
        'estado',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_estado');
    }
}
