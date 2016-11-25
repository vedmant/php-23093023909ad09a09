<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Have many cleaners
     */
    public function cleaners()
    {
        return $this->belongsToMany(Cleaner::class);
    }
}
