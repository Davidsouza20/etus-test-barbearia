<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id','scheduled_date', 'employee_id', 'service_type', 'scheduled_hour'
    ];

    /**
     * Get the client that owns the service.
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Get the employee that owns the service.
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

}
