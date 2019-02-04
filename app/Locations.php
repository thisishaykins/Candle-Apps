<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Locations extends Model
{

	use Notifiable;

	protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'node', 'description', 'address', 'latitude', 'longtitude', 'location_image',
    ];


}
