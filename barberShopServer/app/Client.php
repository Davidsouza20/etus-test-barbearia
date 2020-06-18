<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone',
    ];


    /**
     * Get the services for the client.
     */
    public function services() {
        return $this->hasMany('\App\Service');
    }
}
