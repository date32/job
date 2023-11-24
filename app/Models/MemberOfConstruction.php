<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOfConstruction extends Model
{
    use HasFactory;
    public function construction() {
        return $this->belongsTo(Construction::class);
    }
}
