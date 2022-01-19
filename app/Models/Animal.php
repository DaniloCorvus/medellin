<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'barnyard_id', 'danger', 'age'
    ];

    public function barnyard()
    {
        return $this->belongsTo(Barnyard::class);
    }
}
