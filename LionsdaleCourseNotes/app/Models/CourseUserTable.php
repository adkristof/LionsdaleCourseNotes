<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseUserTable extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable=[
        'seen',
        'completed',
        'user_id',
        'course_id'
    ];
}
