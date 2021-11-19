<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schoole extends Model
{
    //

    protected $guarded = ['id'];


    /**
     * Get all of the students for the Schoole
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
