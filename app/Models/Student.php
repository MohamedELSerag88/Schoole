<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $guarded = ['id'];


    /**
     * Get the schoole that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoole()
    {
        return $this->belongsTo(Schoole::class);
    }
}
