<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'customer_id', 'cleaner_id'];

    /**
     * Have cleaner
     */
    public function cleaner()
    {
        return $this->belongsTo(Cleaner::class);
    }

    /**
     * Have customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get booking view URL
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function url()
    {
        return url('/admin/booking/' . $this->id);
    }
}
