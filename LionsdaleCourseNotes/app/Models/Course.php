<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'name',
        'level',
        'type_id',
        'c_route',
    ];
    public function users():BelongsToMany{
        return $this->belongsToMany(User::class, 'course_user_tables')->withPivot('completed','seen');
    }
    public function type():BelongsTo{
        return $this->belongsTo(Type::class);
    }
}
