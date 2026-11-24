<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['course_name', 'course_id', 'user_id', 'photo', 'description'])]

class Course extends Model
{
    public function application(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
