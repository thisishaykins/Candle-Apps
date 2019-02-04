<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Weather extends Model
{

	use Notifiable;

	protected $table = 'wt_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'name', 'node', 'description', 'bg_image',
    ];

}
