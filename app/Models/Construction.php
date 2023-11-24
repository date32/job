<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    public function memberOfConstructions() {
        return $this->hasMany(MemberOfConstruction::class, 'constructionId', 'id');
    }

    public function delete() {
        $this->memberOfConstructions()->delete();
        return parent::delete();
    }
}
