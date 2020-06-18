<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'employee_type',
    ];

    /**
     * Get the services for the employee.
     */
    public function services() {
        return $this->hasMany('\App\Service');
    }
}
